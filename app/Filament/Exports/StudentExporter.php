<?php

namespace App\Filament\Exports;

use App\Models\Student;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Illuminate\Support\Facades\Storage;

class StudentExporter
{
    /**
     * Resize image to reduce memory usage
     */
    private static function resizeImage($sourcePath, $maxWidth = 200, $maxHeight = 200)
    {
        $imageInfo = getimagesize($sourcePath);
        if (!$imageInfo) {
            return $sourcePath;
        }

        list($width, $height, $type) = $imageInfo;
        
        // Calculate new dimensions
        $ratio = min($maxWidth / $width, $maxHeight / $height);
        if ($ratio >= 1) {
            return $sourcePath; // Image is already small enough
        }
        
        $newWidth = (int)($width * $ratio);
        $newHeight = (int)($height * $ratio);

        // Create image resource from source
        switch ($type) {
            case IMAGETYPE_JPEG:
                $source = imagecreatefromjpeg($sourcePath);
                break;
            case IMAGETYPE_PNG:
                $source = imagecreatefrompng($sourcePath);
                break;
            case IMAGETYPE_GIF:
                $source = imagecreatefromgif($sourcePath);
                break;
            default:
                return $sourcePath;
        }

        if (!$source) {
            return $sourcePath;
        }

        // Create new image
        $thumb = imagecreatetruecolor($newWidth, $newHeight);
        
        // Preserve transparency for PNG
        if ($type == IMAGETYPE_PNG) {
            imagealphablending($thumb, false);
            imagesavealpha($thumb, true);
        }

        // Resize
        imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        // Save to temporary file
        $tempPath = sys_get_temp_dir() . '/resized_' . uniqid() . '.jpg';
        imagejpeg($thumb, $tempPath, 85); // 85% quality

        // Free memory
        imagedestroy($source);
        imagedestroy($thumb);

        return $tempPath;
    }

    public static function export()
    {
        // Increase memory limit temporarily for export
        $originalMemoryLimit = ini_get('memory_limit');
        ini_set('memory_limit', '2048M'); // Increased to 2GB for image embedding
        set_time_limit(300); // 5 minutes timeout
        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set headers
        $headers = [
            'ID', 'Name', 'Photo', 'Father Name', 'Batch',
            'Phone', 'Email', 'T-Shirt Size',
            'Registration Type', 'Participant Count', 'Amount',
            'Payment Mode', 'Sent To', 'Sent From'
        ];

        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', $header);
            $sheet->getStyle($col . '1')->getFont()->setBold(true);
            $col++;
        }

        // Set row height for headers
        $sheet->getRowDimension(1)->setRowHeight(20);

        // First pass: Get only IDs to calculate batch-wise numbering without loading all data
        $studentIdsBatches = Student::where('status', 'active')
            ->orderBy('batch', 'asc')
            ->orderBy('id', 'asc')
            ->select('id', 'batch')
            ->get();

        // Group students by batch and create batch-wise IDs
        $batchCounts = [];
        $studentIds = [];

        foreach ($studentIdsBatches as $student) {
            $batch = $student->batch;
            if (!isset($batchCounts[$batch])) {
                $batchCounts[$batch] = 0;
            }
            $batchCounts[$batch]++;
            $studentIds[$student->id] = $batch . '-' . str_pad($batchCounts[$batch], 2, '0', STR_PAD_LEFT);
        }
        
        // Free memory
        unset($studentIdsBatches);
        unset($batchCounts);

        $row = 2;
        $totalParticipantCount = 0;
        $totalAmount = 0;
        $tempFiles = []; // Track temporary files for cleanup

        // Process students in chunks to avoid memory issues
        Student::where('status', 'active')
            ->select('id', 'name', 'photo', 'father_name', 'batch', 'phone', 'email', 'tshirt', 
                     'registration_type', 'participant_count', 'amount', 'payment_mode', 'sent_to', 'sent_from')
            ->orderBy('batch', 'asc')
            ->orderBy('id', 'asc')
            ->chunk(50, function ($students) use ($sheet, $studentIds, &$row, &$totalParticipantCount, &$totalAmount, &$tempFiles) {
                foreach ($students as $student) {
            // Set row height for images
            $sheet->getRowDimension($row)->setRowHeight(60);

            // Batch-wise ID
            $sheet->setCellValue('A' . $row, $studentIds[$student->id]);
            $sheet->setCellValue('B' . $row, $student->name);

            // Embed photo image
            if ($student->photo) {
                $photoPath = Storage::disk('public')->path($student->photo);
                if (file_exists($photoPath) && filesize($photoPath) < 10485760) { // Skip if > 10MB
                    try {
                        // Resize image to reduce memory usage
                        $resizedPath = self::resizeImage($photoPath);
                        
                        $drawing = new Drawing();
                        $drawing->setName('Photo');
                        $drawing->setPath($resizedPath);
                        $drawing->setHeight(50);
                        $drawing->setCoordinates('C' . $row);
                        $drawing->setOffsetX(5);
                        $drawing->setOffsetY(5);
                        $drawing->setWorksheet($sheet);
                        
                        // Store temp file path for cleanup later (after Excel is saved)
                        if ($resizedPath !== $photoPath) {
                            $tempFiles[] = $resizedPath;
                        }
                    } catch (\Exception $e) {
                        $sheet->setCellValue('C' . $row, 'Error: ' . $e->getMessage());
                    }
                } elseif (!file_exists($photoPath)) {
                    $sheet->setCellValue('C' . $row, 'File not found: ' . $student->photo);
                } else {
                    // File too large
                    $fileSizeMB = round(filesize($photoPath) / 1048576, 2);
                    $sheet->setCellValue('C' . $row, 'Too large (' . $fileSizeMB . 'MB): ' . $student->photo);
                }
            } else {
                $sheet->setCellValue('C' . $row, '-');
            }

            $sheet->setCellValue('D' . $row, $student->father_name);
            $sheet->setCellValue('E' . $row, $student->batch);
            $sheet->setCellValue('F' . $row, $student->phone);
            $sheet->setCellValue('G' . $row, $student->email);
            $sheet->setCellValue('H' . $row, $student->tshirt);
            $sheet->setCellValue('I' . $row, $student->registration_type);
            $sheet->setCellValue('J' . $row, $student->participant_count);
            
            // Calculate adjusted amount based on participant count
            $participantCount = $student->participant_count ?? 1;
            $discount = 15 + ($participantCount - 1) * 9;
            $adjustedAmount = $student->amount - $discount;
            
            // Add to totals
            $totalParticipantCount += $participantCount;
            $totalAmount += $adjustedAmount;
            
            $sheet->setCellValue('K' . $row, $adjustedAmount);
            $sheet->setCellValue('L' . $row, $student->payment_mode);
            $sheet->setCellValue('M' . $row, $student->sent_to);
            $sheet->setCellValue('N' . $row, $student->sent_from);

            $row++;
                }
                
                // Aggressive memory cleanup after each chunk
                foreach ($students as $student) {
                    unset($student);
                }
                unset($students);
                gc_collect_cycles();
            });

        // Add summary row
        $summaryRow = $row;
        $sheet->setCellValue('I' . $summaryRow, 'TOTAL:');
        $sheet->setCellValue('J' . $summaryRow, $totalParticipantCount);
        $sheet->setCellValue('K' . $summaryRow, $totalAmount);
        
        // Style the summary row
        $sheet->getStyle('I' . $summaryRow . ':K' . $summaryRow)->getFont()->setBold(true);
        $sheet->getStyle('I' . $summaryRow . ':K' . $summaryRow)->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFE8F5E9');
        $sheet->getRowDimension($summaryRow)->setRowHeight(25);

        // Auto-size all columns
        foreach (range('A', 'N') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Save file
        $fileName = 'students_export_' . now()->format('Y-m-d_H-i-s') . '.xlsx';
        $tempPath = storage_path('app/temp/' . $fileName);

        // Ensure temp directory exists
        if (!file_exists(storage_path('app/temp'))) {
            mkdir(storage_path('app/temp'), 0755, true);
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($tempPath);

        // Clean up temporary resized image files
        foreach ($tempFiles as $tempFile) {
            if (file_exists($tempFile)) {
                @unlink($tempFile);
            }
        }

        // Restore original memory limit
        ini_set('memory_limit', $originalMemoryLimit);
        
        // Clean up
        $spreadsheet->disconnectWorksheets();
        unset($spreadsheet);
        gc_collect_cycles();

        return response()->download($tempPath, $fileName)->deleteFileAfterSend(true);
    }
}

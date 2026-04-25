<?php

namespace App\Filament\Exports;

use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class StudentExporter
{
    public static function export()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set headers
        $headers = [
            'ID', 'Name', 'Photo', 'Screenshot', 'Father Name', 'Batch',
            'Phone', 'Email', 'T-Shirt Size',
            'Registration Type', 'Participant Count', 'Amount',
            'Payment Mode', 'Sent To', 'Sent From', 'Status'
        ];

        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', $header);
            $sheet->getStyle($col . '1')->getFont()->setBold(true);
            $col++;
        }

        // Set row height for headers
        $sheet->getRowDimension(1)->setRowHeight(20);

        // Get students ordered by batch and id
        $students = Student::orderBy('batch', 'asc')->orderBy('id', 'asc')->get();

        // Group students by batch and create batch-wise IDs
        $batchCounts = [];
        $studentIds = [];

        foreach ($students as $student) {
            $batch = $student->batch;
            if (!isset($batchCounts[$batch])) {
                $batchCounts[$batch] = 0;
            }
            $batchCounts[$batch]++;
            $studentIds[$student->id] = $batch . '-' . str_pad($batchCounts[$batch], 2, '0', STR_PAD_LEFT);
        }

        $row = 2;

        foreach ($students as $student) {
            // Set row height for images
            $sheet->getRowDimension($row)->setRowHeight(60);

            // Batch-wise ID
            $sheet->setCellValue('A' . $row, $studentIds[$student->id]);
            $sheet->setCellValue('B' . $row, $student->name);

            // Photo image (Column C)
            if ($student->photo) {
                $photoPath = Storage::disk('public')->path($student->photo);
                if (file_exists($photoPath)) {
                    try {
                        $drawing = new Drawing();
                        $drawing->setName('Photo');
                        $drawing->setDescription('Student Photo');
                        $drawing->setPath($photoPath);
                        $drawing->setHeight(50);
                        $drawing->setCoordinates('C' . $row);
                        $drawing->setOffsetX(5);
                        $drawing->setOffsetY(5);
                        $drawing->setWorksheet($sheet);
                    } catch (\Exception $e) {
                        // If image fails, just skip it
                    }
                }
            }

            // Screenshot image (Column D)
            if ($student->screenshot) {
                $screenshotPath = Storage::disk('public')->path($student->screenshot);
                if (file_exists($screenshotPath)) {
                    try {
                        $drawing = new Drawing();
                        $drawing->setName('Screenshot');
                        $drawing->setDescription('Payment Screenshot');
                        $drawing->setPath($screenshotPath);
                        $drawing->setHeight(50);
                        $drawing->setCoordinates('D' . $row);
                        $drawing->setOffsetX(5);
                        $drawing->setOffsetY(5);
                        $drawing->setWorksheet($sheet);
                    } catch (\Exception $e) {
                        // If image fails, just skip it
                    }
                }
            }

            $sheet->setCellValue('E' . $row, $student->father_name);
            $sheet->setCellValue('F' . $row, $student->batch);
            $sheet->setCellValue('G' . $row, $student->phone);
            $sheet->setCellValue('H' . $row, $student->email);
            $sheet->setCellValue('I' . $row, $student->tshirt);
            $sheet->setCellValue('J' . $row, $student->registration_type);
            $sheet->setCellValue('K' . $row, $student->participant_count);
            $sheet->setCellValue('L' . $row, $student->amount);
            $sheet->setCellValue('M' . $row, $student->payment_mode);
            $sheet->setCellValue('N' . $row, $student->sent_to);
            $sheet->setCellValue('O' . $row, $student->sent_from);
            $sheet->setCellValue('P' . $row, $student->status);

            $row++;
        }

        // Auto-size columns except image columns
        foreach (range('A', 'P') as $col) {
            if ($col !== 'C' && $col !== 'D') {
                $sheet->getColumnDimension($col)->setAutoSize(true);
            } else {
                // Set fixed width for image columns
                $sheet->getColumnDimension($col)->setWidth(12);
            }
        }

        // Save file
        $fileName = 'students_with_images_' . now()->format('Y-m-d_H-i-s') . '.xlsx';
        $tempPath = storage_path('app/temp/' . $fileName);

        // Ensure temp directory exists
        if (!file_exists(storage_path('app/temp'))) {
            mkdir(storage_path('app/temp'), 0755, true);
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($tempPath);

        return response()->download($tempPath, $fileName)->deleteFileAfterSend(true);
    }
}

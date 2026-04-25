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
            'ID', 'Name', 'Father Name', 'Batch', 'Phone', 'Email',
            'Blood Group', 'Photo', 'Screenshot', 'Profession',
            'Present Address', 'Permanent Address', 'T-Shirt Size',
            'Registration Type', 'Participant Count', 'Amount',
            'Payment Mode', 'Sent To', 'Sent From', 'Status',
            'Ref Code', 'Created At', 'Updated At'
        ];

        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', $header);
            $sheet->getStyle($col . '1')->getFont()->setBold(true);
            $col++;
        }

        // Set row height for headers
        $sheet->getRowDimension(1)->setRowHeight(20);

        // Get students
        $students = Student::orderBy('id', 'desc')->get();
        $row = 2;

        foreach ($students as $student) {
            // Set row height for images
            $sheet->getRowDimension($row)->setRowHeight(60);

            // Basic data
            $sheet->setCellValue('A' . $row, $student->id);
            $sheet->setCellValue('B' . $row, $student->name);
            $sheet->setCellValue('C' . $row, $student->father_name);
            $sheet->setCellValue('D' . $row, $student->batch);
            $sheet->setCellValue('E' . $row, $student->phone);
            $sheet->setCellValue('F' . $row, $student->email);
            $sheet->setCellValue('G' . $row, $student->blood);

            // Photo image
            if ($student->photo) {
                $photoPath = Storage::disk('public')->path($student->photo);
                if (file_exists($photoPath)) {
                    try {
                        $drawing = new Drawing();
                        $drawing->setName('Photo');
                        $drawing->setDescription('Student Photo');
                        $drawing->setPath($photoPath);
                        $drawing->setHeight(50);
                        $drawing->setCoordinates('H' . $row);
                        $drawing->setOffsetX(5);
                        $drawing->setOffsetY(5);
                        $drawing->setWorksheet($sheet);
                    } catch (\Exception $e) {
                        // If image fails, just skip it
                    }
                }
            }

            // Screenshot image
            if ($student->screenshot) {
                $screenshotPath = Storage::disk('public')->path($student->screenshot);
                if (file_exists($screenshotPath)) {
                    try {
                        $drawing = new Drawing();
                        $drawing->setName('Screenshot');
                        $drawing->setDescription('Payment Screenshot');
                        $drawing->setPath($screenshotPath);
                        $drawing->setHeight(50);
                        $drawing->setCoordinates('I' . $row);
                        $drawing->setOffsetX(5);
                        $drawing->setOffsetY(5);
                        $drawing->setWorksheet($sheet);
                    } catch (\Exception $e) {
                        // If image fails, just skip it
                    }
                }
            }

            $sheet->setCellValue('J' . $row, $student->profession);
            $sheet->setCellValue('K' . $row, $student->present_address);
            $sheet->setCellValue('L' . $row, $student->permanent_address);
            $sheet->setCellValue('M' . $row, $student->tshirt);
            $sheet->setCellValue('N' . $row, $student->registration_type);
            $sheet->setCellValue('O' . $row, $student->participant_count);
            $sheet->setCellValue('P' . $row, $student->amount);
            $sheet->setCellValue('Q' . $row, $student->payment_mode);
            $sheet->setCellValue('R' . $row, $student->sent_to);
            $sheet->setCellValue('S' . $row, $student->sent_from);
            $sheet->setCellValue('T' . $row, $student->status);
            $sheet->setCellValue('U' . $row, $student->ref_code);
            $sheet->setCellValue('V' . $row, $student->created_at);
            $sheet->setCellValue('W' . $row, $student->updated_at);

            $row++;
        }

        // Auto-size columns except image columns
        foreach (range('A', 'W') as $col) {
            if ($col !== 'H' && $col !== 'I') {
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

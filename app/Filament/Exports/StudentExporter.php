<?php

namespace App\Filament\Exports;

use App\Models\Student;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class StudentExporter extends Exporter
{
    protected static ?string $model = Student::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('name')
                ->label('Name'),
            ExportColumn::make('father_name')
                ->label('Father Name'),
            ExportColumn::make('batch')
                ->label('Batch'),
            ExportColumn::make('phone')
                ->label('Phone'),
            ExportColumn::make('email')
                ->label('Email'),
            ExportColumn::make('blood')
                ->label('Blood Group'),
            ExportColumn::make('profession')
                ->label('Profession'),
            ExportColumn::make('present_address')
                ->label('Present Address'),
            ExportColumn::make('permanent_address')
                ->label('Permanent Address'),
            ExportColumn::make('tshirt')
                ->label('T-Shirt Size'),
            ExportColumn::make('registration_type')
                ->label('Registration Type'),
            ExportColumn::make('participant_count')
                ->label('Participant Count'),
            ExportColumn::make('amount')
                ->label('Amount'),
            ExportColumn::make('payment_mode')
                ->label('Payment Mode'),
            ExportColumn::make('sent_to')
                ->label('Sent To'),
            ExportColumn::make('sent_from')
                ->label('Sent From'),
            ExportColumn::make('status')
                ->label('Status'),
            ExportColumn::make('ref_code')
                ->label('Reference Code'),
            ExportColumn::make('created_at')
                ->label('Created At'),
            ExportColumn::make('updated_at')
                ->label('Updated At'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your student export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}

<?php

namespace App\Filament\Resources\Students\Pages;

use App\Filament\Exports\StudentExporter;
use App\Filament\Resources\Students\StudentResource;
use Filament\Actions\CreateAction;
use Filament\Actions\ExportAction;
use Filament\Resources\Pages\ListRecords;

class ListStudents extends ListRecords
{
    protected static string $resource = StudentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            ExportAction::make()
                ->exporter(StudentExporter::class)
                ->label('Export Students')
                ->color('success')
                ->icon('heroicon-o-arrow-down-tray'),
        ];
    }
}

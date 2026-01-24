<?php

namespace App\Filament\Resources\Expenses\Pages;

use App\Filament\Resources\Expenses\ExpenseResource;
use App\Models\Expense;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Response;

class ListExpenses extends ListRecords
{
    protected static string $resource = ExpenseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            Action::make('download_excel')
                ->label('Export Excel')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('success')
                ->action(function () {
                    return Response::streamDownload(function () {
                        $expenses = Expense::all();
                        $handle = fopen('php://output', 'w');

                        // Add BOM for Excel UTF-8
                        fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));

                        // Headers
                        fputcsv($handle, ['ID', 'Purpose', 'Amount', 'By Whom', 'Description', 'Created At']);

                        // Data
                        foreach ($expenses as $expense) {
                            fputcsv($handle, [
                                $expense->id,
                                $expense->purpose,
                                $expense->amount,
                                $expense->by_whom,
                                $expense->description,
                                $expense->created_at->format('Y-m-d H:i:s'),
                            ]);
                        }

                        fclose($handle);
                    }, 'expenses-' . now()->format('Y-m-d') . '.csv');
                }),
        ];
    }
}

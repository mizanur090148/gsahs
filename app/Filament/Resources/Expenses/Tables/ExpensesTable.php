<?php

namespace App\Filament\Resources\Expenses\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class ExpensesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('purpose')
                    ->searchable()
                    ->sortable()
                    ->label('উদ্দেশ্য'),

                TextColumn::make('amount')
                    ->numeric()
                    ->sortable()
                    ->prefix('৳ ')
                    ->label('পরিমাণ'),

                TextColumn::make('by_whom')
                    ->searchable()
                    ->sortable()
                    ->label('যিনি ব্যয় করেছেন'),

                ImageColumn::make('voucher')
                    ->disk('public')
                    ->width(60)
                    ->height(60)
                    ->label('ভাউচার'),

                TextColumn::make('description')
                    ->limit(50)
                    ->label('বিবরণ')
                    ->toggleable(isToggledHiddenByDefault: false),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Created At')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Updated At')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}

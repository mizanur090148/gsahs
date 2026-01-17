<?php

namespace App\Filament\Resources\Donations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
// EditAction removed to disable inline editing from list
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Table;

class DonationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->recordUrl(fn () => null)
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('father_name')
                    ->searchable()->label("Father's Name"),
                TextColumn::make('mobile')
                    ->searchable(),
                TextColumn::make('address')
                    ->searchable(),
                TextColumn::make('amount')
                    ->numeric()
                    ->sortable(),
                ImageColumn::make('photo')
                    ->disk('public')
                    ->width(60)
                    ->height(60)
                    ->label('Photo'),
                ImageColumn::make('document')
                    ->disk('public')
                    ->width(60)
                    ->height(60)
                    ->label('Payment Proof'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                // editing disabled from list view
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

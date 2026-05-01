<?php

namespace App\Filament\Resources\Donations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class DonationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('name')
                    ->label('নাম')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('father_name')
                    ->label('পিতার নাম')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('mobile')
                    ->label('প্রেরক নাম্বার')
                    ->searchable(),
                
                TextColumn::make('receiver_mobile')
                    ->label('গ্রহীতা নাম্বার')
                    ->searchable(),
                
                TextColumn::make('address')
                    ->label('ঠিকানা')
                    ->searchable()
                    ->limit(30),
                
                TextColumn::make('amount')
                    ->label('পরিমাণ (৳)')
                    ->money('BDT')
                    ->sortable(),
                
                TextColumn::make('status')
                    ->label('অবস্থা')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'অপেক্ষমাণ',
                        'approved' => 'অনুমোদিত',
                        'rejected' => 'বাতিল',
                        default => $state,
                    }),
                
                ImageColumn::make('photo')
                    ->label('ছবি')
                    ->disk('public')
                    ->width(50)
                    ->height(50)
                    ->circular(),
                
                ImageColumn::make('document')
                    ->label('ডকুমেন্ট')
                    ->disk('public')
                    ->width(50)
                    ->height(50),
                
                TextColumn::make('created_at')
                    ->label('তারিখ')
                    ->dateTime('d M Y, h:i A')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('অবস্থা')
                    ->options([
                        'pending' => 'অপেক্ষমাণ',
                        'approved' => 'অনুমোদিত',
                        'rejected' => 'বাতিল',
                    ]),
            ])
            ->recordActions([
                ViewAction::make()
                    ->label('দেখুন')
                    ->color('info'),
                EditAction::make()
                    ->label('এডিট')
                    ->color('warning'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

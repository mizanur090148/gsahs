<?php

namespace App\Filament\Resources\Students\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class StudentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('batch')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('father_name')
                    ->searchable(),
                ImageColumn::make('photo')
                    ->disk('public')
                    ->width(60)
                    ->height(60)
                    ->circular(),
                ImageColumn::make('screenshot')
                    ->disk('public')
                    ->width(60)
                    ->height(60)
                    ->label('Payment Proof'),
                TextColumn::make('tshirt')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('present_address')
                    ->searchable(),
                TextColumn::make('registration_type')
                    ->badge(),
                TextColumn::make('sent_to')
                    ->searchable(),
                TextColumn::make('participant_count')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('sent_from')
                    ->searchable(),
                TextColumn::make('amount')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('payment_mode')
                    ->searchable(),
            ])
            ->filters([
                SelectFilter::make('batch')
                    ->options([
                        2025 => '2025',
                        2024 => '2024',
                        2023 => '2023',
                        2022 => '2022',
                        2021 => '2021',
                        2020 => '2020',
                        2019 => '2019',
                        2018 => '2018',
                        2017 => '2017',
                        2016 => '2016',
                        2015 => '2015',
                        2014 => '2014',
                        2013 => '2013',
                        2012 => '2012',
                        2011 => '2011',
                        2010 => '2010',
                        2009 => '2009',
                        2008 => '2008',
                        2007 => '2007',
                        2006 => '2006',
                        2005 => '2005',
                        2004 => '2004',
                        2003 => '2003',
                        2002 => '2002',
                        2001 => '2001',
                        2000 => '2000',
                        1999 => '1999',
                        1998 => '1998',
                        1997 => '1997',
                        1996 => '1996',
                        1995 => '1995',
                        1994 => '1994',
                        1993 => '1993',
                        1992 => '1992',
                        1991 => '1991',
                        1990 => '1990',
                        1989 => '1989',
                        1988 => '1988',
                        1987 => '1987',
                        1986 => '1986',
                        1985 => '1985',
                        1984 => '1984',
                        1983 => '1983',
                        1982 => '1982',
                    ]),
                SelectFilter::make('registration_type')
                    ->options([
                        'single' => 'Single',
                        'group' => 'Group',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->paginated([15, 25, 50, 100]);
    }
}

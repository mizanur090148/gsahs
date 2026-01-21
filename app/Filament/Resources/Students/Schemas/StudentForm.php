<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Select::make('batch')
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
                    ])
                    ->required(),
                TextInput::make('father_name')
                    ->required(),
                TextInput::make('phone')->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('present_address')->required(),
                FileUpload::make('photo')
                    ->directory('students/photos')
                    ->disk('public')
                    ->image()->required(),
                FileUpload::make('screenshot')->label('Payment Proof')
                    ->directory('students/photos')
                    ->disk('public')
                    ->image()->required(),
                Select::make('tshirt')
                    ->options([
                        'M' => 'M',
                        'L' => 'L',
                        'XL' => 'XL',
                        'XXL' => 'XXL',
                    ]),
                Select::make('registration_type')
                    ->options(['single' => 'Single', 'group' => 'Group'])
                    ->required(),
                TextInput::make('sent_to')->required(),
                TextInput::make('participant_count')
                    ->numeric()->required(),
                TextInput::make('sent_from')
                    ->required(),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'active' => 'Active',
                    ])
                    ->default('pending')
                    ->required(),
                Select::make('payment_mode')
                    ->options([
                        'bkash' => 'বিকাশ',
                        'nogod' => 'নগদ',
                        'rocket' => 'রকেট',
                        'tap' => 'ট্যাপ',
                    ])
                    ->required(),
            ]);
    }
}

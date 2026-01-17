<?php

namespace App\Filament\Resources\Students\Schemas;

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
                TextInput::make('batch')
                    ->required()
                    ->numeric(),
                TextInput::make('father_name')
                    ->required(),
                TextInput::make('photo'),
                TextInput::make('screenshot'),
                TextInput::make('tshirt'),
                TextInput::make('phone')
                    ->tel(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('present_address'),
                Select::make('registration_type')
                    ->options(['single' => 'Single', 'group' => 'Group'])
                    ->required(),
                TextInput::make('sent_to'),
                TextInput::make('participant_count')
                    ->numeric(),
                TextInput::make('sent_from')
                    ->required(),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->options([
            'pending' => 'Pending',
            'active' => 'Active',
            'approved' => 'Approved',
            'rejected' => 'Rejected',
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

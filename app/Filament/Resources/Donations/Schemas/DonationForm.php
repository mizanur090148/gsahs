<?php

namespace App\Filament\Resources\Donations\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DonationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('father_name'),
                TextInput::make('mobile')
                    ->required(),
                TextInput::make('address'),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                TextInput::make('photo'),
                TextInput::make('document'),

            ]);
    }
}

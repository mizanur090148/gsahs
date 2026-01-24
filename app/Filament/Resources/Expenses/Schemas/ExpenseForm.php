<?php

namespace App\Filament\Resources\Expenses\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class ExpenseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('purpose')
                    ->required()
                    ->maxLength(255)
                    ->label('উদ্দেশ্য'),

                TextInput::make('amount')
                    ->required()
                    ->numeric()
                    ->prefix('৳')
                    ->label('পরিমাণ'),
                TextInput::make('by_whom')
                    ->maxLength(255)
                    ->label('যিনি ব্যয় করেছেন'),

                FileUpload::make('voucher')
                    ->disk('public')
                    ->directory('vouchers')
                    ->acceptedFileTypes(['image/*', 'application/pdf'])
                    ->maxSize(5120)
                    ->image()
                    ->imageEditor()
                    ->label('ভাউচার (ছবি/পিডিএফ)'),

                Textarea::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull()
                    ->label('বিবরণ'),
            ]);
    }
}

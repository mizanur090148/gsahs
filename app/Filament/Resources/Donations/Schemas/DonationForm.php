<?php

namespace App\Filament\Resources\Donations\Schemas;

use Filament\Forms\Components\FileUpload;
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
                    ->label('নাম')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('father_name')
                    ->label('পিতার নাম')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('mobile')
                    ->label('যে নাম্বার থেকে টাকা পাঠানো হয়েছে')
                    ->required()
                    ->tel()
                    ->maxLength(20),
                
                Select::make('receiver_mobile')
                    ->label('যে নাম্বারে টাকা পাঠানো হয়েছে')
                    ->required()
                    ->options([
                        '01610333033' => '01610333033',
                        '01718822094' => '01718822094',
                    ]),
                
                TextInput::make('address')
                    ->label('ঠিকানা')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('amount')
                    ->label('মোট পেমেন্ট (টাকা)')
                    ->required()
                    ->numeric(),
                
                Select::make('status')
                    ->label('অবস্থা')
                    ->required()
                    ->options([
                        'pending' => 'অপেক্ষমাণ',
                        'approved' => 'অনুমোদিত',
                        'rejected' => 'বাতিল',
                    ])
                    ->default('pending'),
                
                FileUpload::make('photo')
                    ->label('ছবি (ঐচ্ছিক)')
                    ->image()
                    ->disk('public')
                    ->directory('donations/photos')
                    ->maxSize(2048),
                
                FileUpload::make('document')
                    ->label('লেনদেন ডকুমেন্ট')
                    ->required()
                    ->disk('public')
                    ->directory('donations/documents')
                    ->acceptedFileTypes(['application/pdf', 'image/*'])
                    ->maxSize(5120),
            ]);
    }
}

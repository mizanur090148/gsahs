<?php

namespace App\Filament\Resources\Donations\Pages;

use App\Filament\Resources\Donations\DonationResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDonation extends CreateRecord
{
    protected static string $resource = DonationResource::class;

    protected static ?string $title = 'নতুন ডোনেশন';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

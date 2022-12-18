<?php

namespace App\Filament\Resources\SpbookResource\Pages;

use App\Filament\Resources\SpbookResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSpbook extends CreateRecord
{
    protected static string $resource = SpbookResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

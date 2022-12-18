<?php

namespace App\Filament\Resources\Granth\ArshbookResource\Pages;

use App\Filament\Resources\Granth\ArshbookResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateArshbook extends CreateRecord
{
    protected static string $resource = ArshbookResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

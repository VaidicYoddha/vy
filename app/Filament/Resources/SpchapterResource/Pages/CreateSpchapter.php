<?php

namespace App\Filament\Resources\SpchapterResource\Pages;

use App\Filament\Resources\SpchapterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSpchapter extends CreateRecord
{
    protected static string $resource = SpchapterResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
}

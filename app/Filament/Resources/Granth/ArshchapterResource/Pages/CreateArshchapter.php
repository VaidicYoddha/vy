<?php

namespace App\Filament\Resources\Granth\ArshchapterResource\Pages;

use App\Filament\Resources\Granth\ArshchapterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateArshchapter extends CreateRecord
{
    protected static string $resource = ArshchapterResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

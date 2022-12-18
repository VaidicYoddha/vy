<?php

namespace App\Filament\Resources\Manu\MshlokResource\Pages;

use App\Filament\Resources\Manu\MshlokResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMshlok extends CreateRecord
{
    protected static string $resource = MshlokResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

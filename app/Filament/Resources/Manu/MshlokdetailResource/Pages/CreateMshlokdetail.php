<?php

namespace App\Filament\Resources\Manu\MshlokdetailResource\Pages;

use App\Filament\Resources\Manu\MshlokdetailResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMshlokdetail extends CreateRecord
{
    protected static string $resource = MshlokdetailResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

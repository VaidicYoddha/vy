<?php

namespace App\Filament\Resources\Manu\MchapterResource\Pages;

use App\Filament\Resources\Manu\MchapterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMchapter extends CreateRecord
{
    protected static string $resource = MchapterResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

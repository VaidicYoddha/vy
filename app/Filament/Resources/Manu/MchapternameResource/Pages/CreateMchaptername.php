<?php

namespace App\Filament\Resources\Manu\MchapternameResource\Pages;

use App\Filament\Resources\Manu\MchapternameResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMchaptername extends CreateRecord
{
    protected static string $resource = MchapternameResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

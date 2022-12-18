<?php

namespace App\Filament\Resources\Shanka\ShankasubResource\Pages;

use App\Filament\Resources\Shanka\ShankasubResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateShankasub extends CreateRecord
{
    protected static string $resource = ShankasubResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

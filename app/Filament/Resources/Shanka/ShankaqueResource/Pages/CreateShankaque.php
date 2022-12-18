<?php

namespace App\Filament\Resources\Shanka\ShankaqueResource\Pages;

use App\Filament\Resources\Shanka\ShankaqueResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateShankaque extends CreateRecord
{
    protected static string $resource = ShankaqueResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

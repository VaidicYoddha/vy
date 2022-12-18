<?php

namespace App\Filament\Resources\Shanka\ShankasubResource\Pages;

use App\Filament\Resources\Shanka\ShankasubResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditShankasub extends EditRecord
{
    protected static string $resource = ShankasubResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

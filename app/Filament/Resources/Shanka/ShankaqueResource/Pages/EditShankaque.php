<?php

namespace App\Filament\Resources\Shanka\ShankaqueResource\Pages;

use App\Filament\Resources\Shanka\ShankaqueResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditShankaque extends EditRecord
{
    protected static string $resource = ShankaqueResource::class;

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

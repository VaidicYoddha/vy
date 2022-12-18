<?php

namespace App\Filament\Resources\Manu\MshlokResource\Pages;

use App\Filament\Resources\Manu\MshlokResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMshlok extends EditRecord
{
    protected static string $resource = MshlokResource::class;

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

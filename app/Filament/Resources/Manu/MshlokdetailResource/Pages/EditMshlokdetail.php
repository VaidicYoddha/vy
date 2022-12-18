<?php

namespace App\Filament\Resources\Manu\MshlokdetailResource\Pages;

use App\Filament\Resources\Manu\MshlokdetailResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMshlokdetail extends EditRecord
{
    protected static string $resource = MshlokdetailResource::class;

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

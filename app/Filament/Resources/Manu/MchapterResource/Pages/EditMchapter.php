<?php

namespace App\Filament\Resources\Manu\MchapterResource\Pages;

use App\Filament\Resources\Manu\MchapterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMchapter extends EditRecord
{
    protected static string $resource = MchapterResource::class;

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

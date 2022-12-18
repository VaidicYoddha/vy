<?php

namespace App\Filament\Resources\Manu\MchapternameResource\Pages;

use App\Filament\Resources\Manu\MchapternameResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMchaptername extends EditRecord
{
    protected static string $resource = MchapternameResource::class;

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

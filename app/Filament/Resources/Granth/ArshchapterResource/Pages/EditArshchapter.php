<?php

namespace App\Filament\Resources\Granth\ArshchapterResource\Pages;

use App\Filament\Resources\Granth\ArshchapterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArshchapter extends EditRecord
{
    protected static string $resource = ArshchapterResource::class;

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

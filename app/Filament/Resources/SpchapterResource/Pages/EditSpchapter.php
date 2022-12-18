<?php

namespace App\Filament\Resources\SpchapterResource\Pages;

use App\Filament\Resources\SpchapterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSpchapter extends EditRecord
{
    protected static string $resource = SpchapterResource::class;

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

<?php

namespace App\Filament\Resources\SpbookResource\Pages;

use App\Filament\Resources\SpbookResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSpbook extends EditRecord
{
    protected static string $resource = SpbookResource::class;

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

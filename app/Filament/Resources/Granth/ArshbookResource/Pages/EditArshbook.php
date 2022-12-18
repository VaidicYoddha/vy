<?php

namespace App\Filament\Resources\Granth\ArshbookResource\Pages;

use App\Filament\Resources\Granth\ArshbookResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArshbook extends EditRecord
{
    protected static string $resource = ArshbookResource::class;

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

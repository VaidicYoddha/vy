<?php

namespace App\Filament\Resources\SpbookResource\Pages;

use App\Filament\Resources\SpbookResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSpbooks extends ListRecords
{
    protected static string $resource = SpbookResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

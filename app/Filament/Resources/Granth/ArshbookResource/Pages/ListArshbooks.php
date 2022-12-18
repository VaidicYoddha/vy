<?php

namespace App\Filament\Resources\Granth\ArshbookResource\Pages;

use App\Filament\Resources\Granth\ArshbookResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListArshbooks extends ListRecords
{
    protected static string $resource = ArshbookResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

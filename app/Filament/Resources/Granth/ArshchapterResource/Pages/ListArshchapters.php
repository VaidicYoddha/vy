<?php

namespace App\Filament\Resources\Granth\ArshchapterResource\Pages;

use App\Filament\Resources\Granth\ArshchapterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListArshchapters extends ListRecords
{
    protected static string $resource = ArshchapterResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

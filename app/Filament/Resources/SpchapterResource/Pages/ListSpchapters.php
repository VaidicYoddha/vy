<?php

namespace App\Filament\Resources\SpchapterResource\Pages;

use App\Filament\Resources\SpchapterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSpchapters extends ListRecords
{
    protected static string $resource = SpchapterResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

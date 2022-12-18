<?php

namespace App\Filament\Resources\Manu\MshlokResource\Pages;

use App\Filament\Resources\Manu\MshlokResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMshloks extends ListRecords
{
    protected static string $resource = MshlokResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

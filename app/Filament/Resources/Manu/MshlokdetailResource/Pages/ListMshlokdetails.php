<?php

namespace App\Filament\Resources\Manu\MshlokdetailResource\Pages;

use App\Filament\Resources\Manu\MshlokdetailResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMshlokdetails extends ListRecords
{
    protected static string $resource = MshlokdetailResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

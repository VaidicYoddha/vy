<?php

namespace App\Filament\Resources\Manu\MchapterResource\Pages;

use App\Filament\Resources\Manu\MchapterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMchapters extends ListRecords
{
    protected static string $resource = MchapterResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

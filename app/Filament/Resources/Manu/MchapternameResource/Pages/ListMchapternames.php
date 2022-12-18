<?php

namespace App\Filament\Resources\Manu\MchapternameResource\Pages;

use App\Filament\Resources\Manu\MchapternameResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMchapternames extends ListRecords
{
    protected static string $resource = MchapternameResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

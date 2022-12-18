<?php

namespace App\Filament\Resources\Shanka\ShankasubResource\Pages;

use App\Filament\Resources\Shanka\ShankasubResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShankasubs extends ListRecords
{
    protected static string $resource = ShankasubResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

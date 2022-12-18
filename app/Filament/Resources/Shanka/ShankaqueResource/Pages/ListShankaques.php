<?php

namespace App\Filament\Resources\Shanka\ShankaqueResource\Pages;

use App\Filament\Resources\Shanka\ShankaqueResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShankaques extends ListRecords
{
    protected static string $resource = ShankaqueResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

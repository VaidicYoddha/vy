<?php

namespace App\Filament\Resources\UsefullinksResource\Pages;

use App\Filament\Resources\UsefullinksResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageUsefullinks extends ManageRecords
{
    protected static string $resource = UsefullinksResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

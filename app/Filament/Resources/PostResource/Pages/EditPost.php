<?php

namespace App\Filament\Resources\PostResource\Pages;

use Filament\Pages\Actions;
use App\Filament\Resources\PostResource;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

        protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function  getFooterWidgets(): array
    {
        return [
            PostResource\Widgets\Commentreply::class,
        ];
    }
}

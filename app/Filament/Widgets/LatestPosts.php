<?php

namespace App\Filament\Widgets;

use Closure;
use Filament\Tables;
use App\Models\blog\Post;
use App\Filament\Resources\PostResource;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestPosts extends BaseWidget
{
    protected static ?string $model = Post::class;

    protected static ?string $heading = 'Latest Posts';

    protected static ?int $sort = 10;

    protected int|string|array $columnSpan = 2;

    protected function getTableQuery(): Builder
    {
        return Post::query()->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('id'),
            Tables\Columns\TextColumn::make('title')
                ->label('Title'),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('open')
                ->url(fn (Post $record): string => PostResource::getUrl('edit', ['record' => $record])),
        ];
    }
}

<?php

namespace App\Filament\Widgets;

use App\Models\blog\Tag;
use Closure;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestTags extends BaseWidget
{
    protected static ?string $heading = 'Latest Tags';

    protected static ?int $sort = 13;

    protected int|string|array $columnSpan = 2;

    protected function getTableQuery(): Builder
    {
        return Tag::query()->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('id'),
            Tables\Columns\TextColumn::make('name')
                ->label('Title'),
        ];
    }
}

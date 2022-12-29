<?php

namespace App\Filament\Widgets;

use Closure;
use Filament\Tables;
use App\Models\blog\Comment;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestComments extends BaseWidget
{
    protected static ?string $heading = 'Latest Comments';

    protected static ?int $sort = 14;

    protected int|string|array $columnSpan = 2;

    protected function getTableQuery(): Builder
    {
        return Comment::query()->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('id'),
            Tables\Columns\TextColumn::make('message')
                ->label('Title'),
        ];
    }
}

<?php

namespace App\Filament\Widgets;

use Closure;
use Filament\Tables;
use App\Models\blog\Category;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestCategory extends BaseWidget
{
    protected static ?string $heading = 'Latest Categories';

    protected static ?int $sort = 11;

    protected int|string|array $columnSpan = 2;

    protected function getTableQuery(): Builder
    {
        return Category::query()->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('id'),
            Tables\Columns\TextColumn::make('name')
                ->label('Name'),
        ];
    }
}

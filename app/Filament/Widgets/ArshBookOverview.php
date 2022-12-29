<?php

namespace App\Filament\Widgets;

use App\Models\admin\Arshbook;
use App\Models\admin\Shankaque;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class ArshBookOverview extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 3;

    protected function getCards(): array
    {
        return [
            Card::make('Total Granths', Arshbook::query()->where('is_visible', 1)->count()),
            Card::make('Shanka Samdhan', Shankaque::query()->where('is_visible', 1)->count()),
            Card::make('Shanka Subjects', Shankaque::query()->where('is_visible', 1)->count()),
        ];
    }
}

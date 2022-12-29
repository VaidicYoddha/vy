<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\All\Language;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class AdminpanelOverview extends BaseWidget
{
    protected static ?int $sort = 0;

    protected int|string|array $columnSpan = 3;

    protected function getCards(): array
    {
        return [
            Card::make('Total Users', User::query()->count())->color('success'),
            Card::make('SuperAdmins', User::query()->where('role_id', 1)->count()),
            Card::make('Total Admins', User::query()->where('role_id', 2)->count()),
            Card::make('Total Languages', Language::query()->where('is_visible', 1)->count()),

        ];
    }
}

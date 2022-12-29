<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\blog\Tag;
use App\Models\blog\Post;
use App\Models\All\Author;
use App\Models\admin\Spbook;

use App\Models\admin\Arshbook;
use App\Models\admin\Spchapter;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected int|string|array $columnSpan = 3;

    protected function getCards(): array
    {
        return [


            Card::make('Total Satyarth Prakash Books', Spbook::query()->where('is_visible', 1)->count()),
            Card::make('Total SP Sanskrit समुल्लास', Spchapter::query()->where('language_id', 2)->count()),
            Card::make('Total SP Marathi समुल्लास', Spchapter::query()->where('language_id', 1)->count()),
            Card::make('Total SP Hindi समुल्लास', Spchapter::query()->where('language_id', 3)->count()),
            Card::make('Total SP English Chapters', Spchapter::query()->where('language_id', 4)->count()),





        ];
    }
}


<?php

namespace App\Filament\Widgets;

use App\Models\blog\Tag;
use App\Models\blog\Post;
use App\Models\All\Author;
use App\Models\blog\Comment;
use App\Models\blog\Category;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class BlogOverview extends BaseWidget
{
   protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 3;

    protected function getCards(): array
    {
        return [

            Card::make('Total Category', Category::query()->where('is_visible', 1)->count()),
            Card::make('Total Tags', Tag::query()->count()),
            Card::make('Total Posts', Post::query()->count()),
            Card::make('Visible Posts For Viewers', Post::query()->where('is_visible', 1)->count()),
            Card::make('Draft Posts', Post::query()->where('is_visible', 0)->count()),
            Card::make('Total Comments', Comment::query()->where('is_visible', 1)->count()),
            Card::make('Total Authors', Author::query()->where('is_visible', 1)->count()),


        ];
    }
}

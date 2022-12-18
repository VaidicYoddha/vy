<?php

namespace App\Filament\Resources\PostResource\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;

class Commentreply extends Widget
{
    protected static string $view = 'filament.resources.post-resource.widgets.commentreply';

    public Model $record;

        protected function getFooterWidgetsColumns(): int | array
    {
        return [
            'md' => 4,
            'xl' => 1,
        ];
    }

    protected int | string | array $columnSpan = 'full';
}

<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\blog\Tag;
use App\Models\blog\Post;
use App\Models\All\Author;
use Illuminate\Support\Str;
use App\Models\All\Language;
use Filament\Resources\Form;
use App\Models\blog\Category;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MultiSelect;
use Filament\Tables\Columns\BooleanColumn;
use App\Filament\Resources\PostResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PostResource\RelationManagers;
use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $slug = 'blog/posts';

    protected static ?string $navigationGroup = 'Blog';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?int $navigationSort = 3;

    protected int | string | array $columnSpan = 'full';

      public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Post')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->lazy()
                                    ->afterStateUpdated(fn (string $context, $state, callable $set) => $context === 'create' ? $set('slug', Str::slug($state)) : null),

                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    //->disabled()
                                    //->helperText('English में लिखे साथ में हर एक शब्द के बिच (-) यह ऐड करके एकसाथ टाइटल लिखे |')
                                    ->unique(Post::class, 'slug', ignoreRecord: true),

                                TinyEditor::make('content')
                                    ->required()
                                    ->columnSpan('full')->height(500),

                                Forms\Components\RichEditor::make('ref')
                                ->label('Refreneces')
                                    ->required()
                                    ->columnSpan('full'),

                                Forms\Components\Select::make('author_id')
                                    ->label('Author')
                                    ->options(Author::all()->pluck('name', 'id'))
                                    ->searchable()
                                    ->required(),

                                Forms\Components\Select::make('category_id')
                                    ->label('Category')
                                    ->relationship('category', 'name')
                                    //->options(Category::all()->pluck('name', 'id'))
                                    ->searchable()
                                    ->required()
                                    ->createOptionForm([
                                                Forms\Components\TextInput::make('name')
                                                        ->reactive()
                                                        ->afterStateUpdated(function (Closure $set, $state) {
                                                            $set('slug', Str::slug($state));
                                                        }),

                                                Forms\Components\TextInput::make('slug')
                                                    ->disabled()
                                                    ->required()
                                                    ->unique(Category::class, 'slug', ignoreRecord: true),
                                    ])
                                    ->createOptionAction(function (Forms\Components\Actions\Action $action) {
                                        return $action
                                            ->modalHeading('Create category')
                                            ->modalButton('Create category')
                                            ->modalWidth('lg');
                                    }),

                                Forms\Components\Select::make('language_id')
                                    ->label('Language')
                                    ->options(Language::all()->pluck('name', 'id'))
                                    ->searchable()
                                    ->required(),

                                Forms\Components\DatePicker::make('published_at')
                                    ->label('Published Date'),


                                Forms\Components\Toggle::make('is_visible')
                                    ->label('Approved for public')
                                    ->default(false),

                                Forms\Components\MultiSelect::make('tags')
                                    ->label('Tags')
                                    ->relationship('tags','name')
                                    ->createOptionForm([
                                                Forms\Components\TextInput::make('name')
                                                        ->reactive()
                                                        ->afterStateUpdated(function (Closure $set, $state) {
                                                            $set('slug', Str::slug($state));
                                                        }),

                                                Forms\Components\TextInput::make('slug')
                                                    ->disabled()
                                                    ->required()
                                                    ->unique(Tag::class, 'slug', ignoreRecord: true),
                                    ])
                                    ->createOptionAction(function (Forms\Components\Actions\Action $action) {
                                        return $action
                                            ->modalHeading('Create tag')
                                            ->modalButton('Create tag')
                                            ->modalWidth('lg');
                                    })
                                    ->searchable()
                                    ->required(),

                                // MultiSelect::make('tags')
                                //             ->getSearchResultsUsing(fn (string $search) => Tag::where('name', 'like', "%{$search}%")->limit(50)->pluck('name', 'id'))
                                //             ->getOptionLabelsUsing(fn (array $values) => Tag::find($values)->pluck('name')),

                            ])->collapsible()
                            ->columns(2),
                        // Forms\Components\Section::make('SEO')
                        //     ->schema([
                        //         SEO::make(),
                        //         ])->columns(1)->collapsible(),

                        // Forms\Components\Section::make('Image')
                        //     ->schema([
                        //         Forms\Components\FileUpload::make('image')
                        //             ->label('Image'),
                        //     ])
                        //     ->collapsible(),
                    ])
                    ->columnSpan(['lg' => fn (?Post $record) => $record === null ? 3 : 2]),

                        Forms\Components\Card::make()
                            ->schema([
                                Forms\Components\Placeholder::make('created_at')
                                    ->label('Created at')
                                    ->content(fn (Post $record): string => $record->created_at->diffForHumans()),

                                Forms\Components\Placeholder::make('updated_at')
                                    ->label('Last modified at')
                                    ->content(fn (Post $record): string => $record->updated_at->diffForHumans()),
                            ])
                            ->columnSpan(['lg' => 1])
                            ->hidden(fn (?Post $record) => $record === null),
                    ])
                    ->columns([
                        'sm' => 3,
                        'lg' => null,

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')->toggleable(),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                // Tables\Columns\TextColumn::make('slug')
                //     ->searchable()
                //     ->sortable(),
                Tables\Columns\TextColumn::make('author.name')
                    ->searchable()
                    ->sortable()->toggleable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->searchable()
                    ->sortable()->toggleable(),
                Tables\Columns\TextColumn::make('language.name')
                    ->searchable()
                    ->sortable()->toggleable(),
                BooleanColumn::make('is_visible')
                    ->label('Published')
                    ->trueIcon('heroicon-o-badge-check')
                    ->falseIcon('heroicon-o-x-circle'),
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Published Date')
                    ->date(),
            ])
            ->filters([
                SelectFilter::make('author')->relationship('author', 'name'),

                SelectFilter::make('category')->relationship('category', 'name'),

                // SelectFilter::make('deleted_at')
                //     ->options([
                //              'with-trashed' => 'With Trashed',
                //              'only-trashed' => 'Only Trashed',
                //         ])->query(function (Builder $query, array $data) {
                //             $query->when($data['value'] === 'with-trashed', function(Builder $query){
                //                 $query->withTrashed();
                //             })->when($data['value'] === 'only-trashed', function(Builder $query){
                //                 $query->onlyTrashed();
                //             });
                //         }),

                Tables\Filters\TrashedFilter::make(),
                Tables\Filters\Filter::make('published_at')
                    ->form([
                        Forms\Components\DatePicker::make('published_from')
                            ->placeholder(fn ($state): string => 'Jan 1, ' . now()->format('Y')),
                        Forms\Components\DatePicker::make('published_until')
                            ->placeholder(fn ($state): string => now()->format('M d, Y')),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['published_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('published_at', '>=', $date),
                            )
                            ->when(
                                $data['published_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('published_at', '<=', $date),
                            );
                    }),
                SelectFilter::make('is_visible')
                    ->options([
                             '1' => 'Published',
                             '0' => 'Draft',
                        ]),
            ])
            ->actions([
                //Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                FilamentExportBulkAction::make('export')
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function  getWidgets(): array
    {
        return [
            PostResource\Widgets\Commentreply::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        if (auth()->user()->id != 1) {
            return parent::getEloquentQuery()->whereBelongsTo(auth()->user());
        }
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);

    }


}

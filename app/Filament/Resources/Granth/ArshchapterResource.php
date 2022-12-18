<?php

namespace App\Filament\Resources\Granth;

use Filament\Forms;
use Filament\Tables;
use App\Models\All\Author;
use Illuminate\Support\Str;
use App\Models\All\Language;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\admin\Arshbook;
use Filament\Resources\Resource;
use App\Models\admin\Arshchapter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BooleanColumn;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Granth\ArshchapterResource\Pages;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use App\Filament\Resources\Granth\ArshchapterResource\RelationManagers;

class ArshchapterResource extends Resource
{
    protected static ?string $model = Arshchapter::class;

    protected static ?string $slug = '/granth/arshchapter';

    protected static ?string $navigationGroup = 'Granth';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('language_id')
                    ->label('Language')
                    ->options(Language::all()->pluck('name', 'id'))
                    ->reactive()
                    ->searchable()
                    ->required()
                    ->afterStateUpdated(fn ( callable $set) => $set('arshbook_id', null)),
                Forms\Components\Select::make('arshbook_id')
                    ->label('Granth')
                    ->options( function (callable $get) {
                        $language = Language::find($get('language_id'));

                        if(! $language){
                            return Arshbook::all()->pluck('name', 'id');
                        }
                       return $language->arshbooks->pluck('name', 'id');
                    })
                    ->searchable()
                    ->required(),


                Forms\Components\TextInput::make('title')
                    ->required()
                    ->lazy()
                    ->afterStateUpdated(fn (string $context, $state, callable $set) => $context === 'create' ? $set('slug', Str::slug($state)) : null),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->unique(Arshchapter::class, 'slug', ignoreRecord: true),

                Forms\Components\TextInput::make('chapter_no')
                    ->required(),

                Forms\Components\Select::make('author_id')
                    ->label('Author')
                    ->options(Author::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),

                Forms\Components\DatePicker::make('published_at')
                    ->label('Published Date'),


                Forms\Components\Toggle::make('is_visible')
                    ->label('Approved for public')
                    ->default(false),

                TinyEditor::make('content')
                    ->required()
                    ->columnSpan('full')->height(500),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('arshbooks.name')
                    ->label('Granth')
                    ->searchable()
                    ->sortable()->toggleable(),
                Tables\Columns\TextColumn::make('chapter_no')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('author.name')
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
                Tables\Filters\TrashedFilter::make(),
                SelectFilter::make('author')->relationship('author', 'name'),

                SelectFilter::make('language')->relationship('language', 'name'),

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
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArshchapters::route('/'),
            'create' => Pages\CreateArshchapter::route('/create'),
            'edit' => Pages\EditArshchapter::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}

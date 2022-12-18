<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\All\Author;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AuthorResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AuthorResource\RelationManagers;
use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;

class AuthorResource extends Resource
{
    protected static ?string $model = Author::class;

    protected static ?string $slug = '/authors';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                    Forms\Components\Card::make()
                            ->schema([
                            Forms\Components\TextInput::make('name')
                                ->required(),

                            Forms\Components\TextInput::make('email')
                                ->email()
                                ->unique(Author::class, 'email', ignoreRecord: true),

                            Forms\Components\Toggle::make('is_visible')
                                ->label('Approved for public')
                                ->default(true),

                            Forms\Components\MarkdownEditor::make('bio')
                                ->columnSpan('full'),

                            Forms\Components\TextInput::make('phone')
                                ->label('Contact No'),

                            Forms\Components\TextInput::make('facebook')
                                ->label('Facebook'),

                            Forms\Components\TextInput::make('twitter')
                                ->label('Twitter'),
                            Forms\Components\TextInput::make('youtube')
                                ->label('Youtube'),

                        ])->columns(2),
                        //   Forms\Components\Section::make('Image')
                        //     ->schema([
                        //         FileUpload::make('image')
                        //             ->label('Image')->image()
                        //     ])
                        //     ->collapsible(),
                    ])
                    ->columnSpan(['lg' => fn (?Author $record) => $record === null ? 3 : 2]),

                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Created at')
                            ->content(fn (Author $record): string => $record->created_at->diffForHumans()),

                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Last modified at')
                            ->content(fn (Author $record): string => $record->updated_at->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn (?Author $record) => $record === null),
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
                // Tables\Columns\ImageColumn::make('image')
                //     ->label('Image'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BooleanColumn::make('is_visible')
                    ->label('Visibility')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                FilamentExportBulkAction::make('export')
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageAuthors::route('/'),
        ];
    }

    // public static function getEloquentQuery(): Builder
    // {
    //     return parent::getEloquentQuery()->whereBelongsTo(auth()->user());
    // }
    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->name;
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Author' => $record->author->name,
            'Category' => $record->category->name,
        ];
    }

}

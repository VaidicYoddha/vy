<?php

namespace App\Filament\Resources\Shanka;

use Filament\Forms;
use Filament\Tables;
use App\Models\All\Author;
use App\Models\All\Language;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\admin\Shankaque;
use App\Models\admin\Shankasub;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BooleanColumn;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Shanka\ShankaqueResource\Pages;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use App\Filament\Resources\Shanka\ShankaqueResource\RelationManagers;

class ShankaqueResource extends Resource
{
    protected static ?string $model = Shankaque::class;

    protected static ?string $slug = '/shanka/que';

    protected static ?string $navigationGroup = 'Shanka';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('language_id')
                    ->label('Language')
                    ->options(Language::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),

                    Forms\Components\Select::make('sub_id')
                    ->label('Subject')
                    ->options(Shankasub::all()->pluck('subject', 'id'))
                    ->searchable()
                    ->required(),

                Forms\Components\TextInput::make('shanka')
                      ->required(),

                      Forms\Components\Select::make('author_id')
                      ->label('Author')
                      ->options(Author::all()->pluck('name', 'id'))
                      ->searchable()
                      ->required(),

                Forms\Components\Toggle::make('is_visible')
                    ->label('Approved for public')
                    ->default(false),

                TinyEditor::make('samadhan')
                    ->required()
                    ->columnSpan('full')->height(500),
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('subject.subject')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('shanka')
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
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
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
            'index' => Pages\ListShankaques::route('/'),
            'create' => Pages\CreateShankaque::route('/create'),
            'edit' => Pages\EditShankaque::route('/{record}/edit'),
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

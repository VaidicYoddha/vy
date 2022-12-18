<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Illuminate\Support\Str;
use App\Models\admin\Spbook;
use App\Models\All\Language;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BooleanColumn;
use App\Filament\Resources\SpbookResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SpbookResource\RelationManagers;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class SpbookResource extends Resource
{
    protected static ?string $model = Spbook::class;

    protected static ?string $slug = 'sp/books';

    protected static ?string $navigationGroup = 'satyarth prakash';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->lazy()
                    ->afterStateUpdated(fn (string $context, $state, callable $set) => $context === 'create' ? $set('slug', Str::slug($state)) : null),

                Forms\Components\TextInput::make('slug')                                    
                    ->required()
                    ->unique(Spbook::class, 'slug', ignoreRecord: true),
                
                Forms\Components\Select::make('language_id')
                    ->label('Language')
                    ->options(Language::all()->pluck('name', 'id'))
                    ->searchable()                                    
                    ->required(),
                Forms\Components\Toggle::make('is_visible')
                    ->label('Approved for public')
                    ->default(false),
                TinyEditor::make('details')
                    ->required()
                    ->columnSpan('full')->height(500),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
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
                SelectFilter::make('language')->relationship('language', 'name'),
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
                Tables\Actions\RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
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
            'index' => Pages\ListSpbooks::route('/'),
            'create' => Pages\CreateSpbook::route('/create'),
            'edit' => Pages\EditSpbook::route('/{record}/edit'),
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

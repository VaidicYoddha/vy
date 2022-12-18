<?php

namespace App\Filament\Resources\Manu;

use Filament\Forms;
use Filament\Tables;
use App\Models\All\Language;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use App\Models\admin\MchapterName;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BooleanColumn;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Manu\MchapternameResource\Pages;
use App\Filament\Resources\Manu\MchapternameResource\RelationManagers;

class MchapternameResource extends Resource
{
    protected static ?string $model = MchapterName::class;

    protected static ?string $slug = '/manusmruti/mchaptername';

    protected static ?string $navigationGroup = 'Manusmruti';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('language_id')
                    ->label('Language')
                    ->options(Language::all()->pluck('name', 'id'))
                    ->searchable()                                    
                    ->required(),
                Forms\Components\TextInput::make('chapter_no')
                    ->required(),                    
                Forms\Components\TextInput::make('name')
                    ->required(),

                Forms\Components\Toggle::make('is_visible')
                    ->label('Visible to Users.')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('language.name')
                    ->searchable()
                    ->sortable()->toggleable(),
                Tables\Columns\TextColumn::make('chapter_no')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                BooleanColumn::make('is_visible')
                    ->label('Published')
                    ->trueIcon('heroicon-o-badge-check')
                    ->falseIcon('heroicon-o-x-circle'),
            ])
            ->filters([
                SelectFilter::make('language')->relationship('language', 'name'),
                Tables\Filters\TrashedFilter::make(),
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
            'index' => Pages\ListMchapternames::route('/'),
            'create' => Pages\CreateMchaptername::route('/create'),
            'edit' => Pages\EditMchaptername::route('/{record}/edit'),
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

<?php

namespace App\Filament\Resources\Manu;

use Filament\Forms;
use Filament\Tables;
use App\Models\admin\Mshlok;
use App\Models\All\Language;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\admin\Mchapter;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BooleanColumn;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Manu\MshlokResource\Pages;
use App\Filament\Resources\Manu\MshlokResource\RelationManagers;

class MshlokResource extends Resource
{
    protected static ?string $model = Mshlok::class;

    protected static ?string $slug = '/manusmruti/mshlok';


    protected static ?string $navigationGroup = 'Manusmruti';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make('mchapter_id')
                    ->label('mchapter')
                    ->options(Mchapter::all()->pluck('mchapter_no', 'id'))
                    ->searchable()                                    
                    ->required(),
                Forms\Components\TextInput::make('mshlok_no')
                    ->required(),                    
                Forms\Components\TextInput::make('title')
                    ->required(),

                Forms\Components\Toggle::make('is_visible')
                    ->label('Visible to Users.')
                    ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('mchapter.mchapter_no')
                    ->searchable()
                    ->sortable()->toggleable(),
                Tables\Columns\TextColumn::make('mshlok_no')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ListMshloks::route('/'),
            'create' => Pages\CreateMshlok::route('/create'),
            'edit' => Pages\EditMshlok::route('/{record}/edit'),
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

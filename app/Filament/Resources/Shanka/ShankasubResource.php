<?php

namespace App\Filament\Resources\Shanka;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\admin\Shankasub;
use Filament\Resources\Resource;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BooleanColumn;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Shanka\ShankasubResource\Pages;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use App\Filament\Resources\Shanka\ShankasubResource\RelationManagers;

class ShankasubResource extends Resource
{
    protected static ?string $model = Shankasub::class;

    protected static ?string $slug = '/shanka/sub';


    protected static ?string $navigationGroup = 'Shanka';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('subject')
                    ->required(),

                Forms\Components\Toggle::make('is_visible')
                    ->label('Approved for public')
                    ->default(false),
                TinyEditor::make('details')
                    ->columnSpan('full')->height(500),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('subject')
                    ->searchable()
                    ->sortable(),
                BooleanColumn::make('is_visible')
                    ->label('Published')
                    ->trueIcon('heroicon-o-badge-check')
                    ->falseIcon('heroicon-o-x-circle'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                SelectFilter::make('subject'),
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
            'index' => Pages\ListShankasubs::route('/'),
            'create' => Pages\CreateShankasub::route('/create'),
            'edit' => Pages\EditShankasub::route('/{record}/edit'),
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

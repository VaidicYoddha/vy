<?php

namespace App\Filament\Resources\Manu;

use Filament\Forms;
use Filament\Tables;
use App\Models\All\Author;
use App\Models\admin\Mshlok;
use App\Models\All\Language;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\admin\Mchapter;
use Filament\Resources\Resource;
use App\Models\admin\MchapterName;
use App\Models\admin\Mshlokdetail;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BooleanColumn;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Manu\MshlokdetailResource\Pages;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use App\Filament\Resources\Manu\MshlokdetailResource\RelationManagers;

class MshlokdetailResource extends Resource
{
    protected static ?string $model = Mshlokdetail::class;

    protected static ?string $slug = '/manusmruti/mshlokdetail';

    protected static ?string $navigationGroup = 'Manusmruti';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('mchapter_id')
                    ->label('Chapter')
                    ->options(Mchapter::all()->pluck('mchapter_no', 'id'))
                    ->reactive()
                    ->searchable()
                    ->required()
                    ->afterStateUpdated(fn ( callable $set) => $set('mshlok_id', null)),
                Forms\Components\Select::make('mshlok_id')
                    ->label('Shlok ')
                    ->options( function (callable $get) {
                        $chapter = Mchapter::find($get('mchapter_id'));

                        if(! $chapter){
                            return Mshlok::all()->pluck('mshlok_no', 'id');
                        }
                       return $chapter->mshlok->pluck('mshlok_no', 'id');
                    })
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('language_id')
                    ->label('Language')
                    ->options(Language::all()->pluck('name', 'id'))
                    ->reactive()
                    ->searchable()
                    ->required()
                    ->afterStateUpdated(fn ( callable $set) => $set('chapter_name_id', null)),
                Forms\Components\Select::make('chapter_name_id')
                    ->label('Chapter Name')
                    ->options( function (callable $get) {
                        $language = Language::find($get('language_id'));

                        if(! $language){
                            return MchapterName::all()->pluck('name', 'id');
                        }
                       return $language->chaptername->pluck('name', 'id');
                    })
                    ->searchable()
                    ->required(),

                Forms\Components\Toggle::make('is_visible')
                    ->label('Visible to Users.')
                    ->default(false),

                Forms\Components\Select::make('author_id')
                    ->label('Author')
                    ->options(Author::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),

                TinyEditor::make('details')
                    ->required()
                    ->columnSpan('full')->height(500),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('language.name')
                    ->searchable()
                    ->sortable()->toggleable(),
                Tables\Columns\TextColumn::make('mchapter_id')
                ->label('Chapter')
                    ->searchable()
                    ->sortable()->toggleable(),
                Tables\Columns\TextColumn::make('mshlok.title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('chaptername.name')
                    ->searchable()
                    ->sortable()->toggleable(),
                Tables\Columns\TextColumn::make('author.name')
                    ->searchable()
                    ->sortable()->toggleable(),
                BooleanColumn::make('is_visible')
                    ->label('Published')
                    ->trueIcon('heroicon-o-badge-check')
                    ->falseIcon('heroicon-o-x-circle'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                SelectFilter::make('author')->relationship('author', 'name'),
                SelectFilter::make('mchapter')->relationship('mchapter', 'mchapter_no'),
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
            'index' => Pages\ListMshlokdetails::route('/'),
            'create' => Pages\CreateMshlokdetail::route('/create'),
            'edit' => Pages\EditMshlokdetail::route('/{record}/edit'),
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

<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Resources\Pages\Page;
use Spatie\Permission\Models\Role;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\UserResource\Pages;
use Filament\Forms\Components\BelongsToSelect;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Filament Shield';

    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('email')->required(),

                TextInput::make('password')
                            ->password()
                            ->maxLength(255)
                            ->dehydrateStateUsing(static fn (null|string $state): null|string =>
                                filled($state) ? Hash::make($state) : null,
                            )->required(static fn (Page $livewire): bool =>
                                $livewire instanceof CreateUser,
                            )->dehydrated(static fn (null|string $state): bool =>
                                filled($state),
            ),

            // BelongsToSelect::make('role_id')
            //                         ->label('Role')
            //                         ->options(Role::all()->pluck('name', 'id'))
            //                         ->searchable()
            //                         ->required(),
                Select::make('isban')
                        ->options([
                            '1' => 'Banned',
                            '0' => 'Not Banned',
                        ])->searchable(),
                DateTimePicker::make('email_verified_at')->required()->withoutSeconds(),

                Select::make('role_id') ->options([
                    '1' => 'Super Admin',
                    '2' => 'Admin',
                    '3' => 'User'
                ])->searchable()->required(),

                Forms\Components\Section::make('Roles')->schema([
                    Forms\Components\CheckboxList::make('roles')->relationship('roles','name'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table

            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->sortable()->searchable()->toggleable(),
                BooleanColumn::make('isban')
                    ->label('BAN')
                    ->trueIcon('heroicon-o-badge-check')
                    ->falseIcon('heroicon-o-x-circle'),
                Tables\Columns\TextColumn::make('roles.name')
                    ->searchable()
                    ->sortable()->toggleable(),
                // BadgeColumn::make('role_as')
                // ->colors([
                //     'primary'

                //   ])
                //     ->enum([
                //         '1' => 'Super Admin',
                //         '2' => 'Admin',
                //         '0' => 'User',
                //     ])->sortable(),

                Tables\Columns\TextColumn::make('last_seen')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->sortable()->searchable()->toggleable(),

            ])
            ->filters([
                SelectFilter::make('role_id')
                                    ->label('Role')
                                    ->options(Role::all()->pluck('name', 'id')),

                Filter::make('created_at')
                        ->form([
                            Forms\Components\DatePicker::make('created_from'),
                            Forms\Components\DatePicker::make('created_until'),
                        ])
                        ->query(function (Builder $query, array $data): Builder {
                            return $query
                                ->when(
                                    $data['created_from'],
                                    fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                                )
                                ->when(
                                    $data['created_until'],
                                    fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                                );
                        }),
                TernaryFilter::make('email_verified_at')
                                  ->nullable()
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->prependBulkActions([
                \FilamentPro\FilamentBan\Actions\Ban::make('ban'),
                \FilamentPro\FilamentBan\Actions\Unban::make('unban'),
            ]);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
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

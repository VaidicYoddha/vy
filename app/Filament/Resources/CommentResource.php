<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\blog\Post;
use App\Models\blog\Comment;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BooleanColumn;
use App\Filament\Resources\CommentResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CommentResource\RelationManagers;
use Filament\Facades\Filament;
use Filament\Forms\Components\MarkdownEditor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;
use App\Filament\Resources\PostResource;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $slug = 'blog/comments';

    protected static ?string $navigationGroup = 'Blog';

    protected static ?string $navigationIcon = 'heroicon-o-chat';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                    MarkdownEditor::make('message')
                    ->label('Comment')
                    ->columnSpan('full'),
                    Forms\Components\Toggle::make('is_visible')
                        ->label('Approved for public')
                        ->default(true),                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('post.title')
                    ->url(fn (Comment $record) => PostResource::getUrl('edit',['record' => $record->post]) )
                    ->openUrlInNewTab()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->url(fn (Comment $record) => UserResource::getUrl('edit',['record' => $record->user]) )
                    ->openUrlInNewTab()
                    ->searchable()
                    ->sortable(),
                BooleanColumn::make('is_visible')
                    ->label('Approved')
                    ->trueIcon('heroicon-o-badge-check')
                    ->falseIcon('heroicon-o-x-circle')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created Date')
                    ->date(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                SelectFilter::make('is_visible')
                    ->options([
                             '1' => 'Aprroved',                          
                             '0' => 'Un Approve',
                        ]),
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->placeholder(fn ($state): string => 'Jan 1, ' . now()->format('Y')),
                        Forms\Components\DatePicker::make('created_until')
                            ->placeholder(fn ($state): string => now()->format('M d, Y')),
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
            ])
            ->actions([
                // Tables\Actions\Action::make('approve')
                //     ->action(function (Comment $record){
                //         $record->approve();

                //         Filament::notify('success', 'Approved');
                //     })
                //     ->requiresConfirmation()
                //     ->hidden(function (Comment $record){ 
                //         $record->approve();
                //     })
                //     ->color('success')
                //     ->icon('heroicon-s-check'),
                Tables\Actions\ViewAction::make()
                    ->modalContent(fn (Comment $record): HtmlString => new HtmlString($record->message))
                    ->form([]),
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

    public static function canEdit(Model $record): bool
    {
        return true;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageComments::route('/'),
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

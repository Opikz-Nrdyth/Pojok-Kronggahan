<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\News;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Engagements;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EngagementsResource\Pages;
use App\Filament\Resources\EngagementsResource\RelationManagers;

class EngagementsResource extends Resource
{
    protected static ?string $model = Engagements::class;
    protected static ?string $navigationIcon = 'heroicon-o-cursor-arrow-ripple';
    protected static ?string $navigationGroup = "News";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('clicks')
                            ->label('Clicks')
                            ->numeric()
                            ->disabled()
                            ->default(0)
                            ->required(),

                        TextInput::make('view_hours')
                            ->label('View Hours')
                            ->numeric()
                            ->disabled()
                            ->default(0)
                            ->required(),

                        TextInput::make('likes')
                            ->label('Likes')
                            ->numeric()
                            ->disabled()
                            ->default(0)
                            ->required(),

                        TextInput::make('dislikes')
                            ->label('Dislikes')
                            ->numeric()
                            ->disabled()
                            ->default(0)
                            ->required(),

                        // Foreign key to content
                        Select::make('content_id')
                            ->label('News Article')
                            ->disabled(fn($get) => $get('id') !== null)
                            ->options(News::all()->pluck('title', 'id'))
                            ->required(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('news_relation.title')->label("News Title")->sortable()->searchable(),
                TextColumn::make('clicks')->sortable(),
                TextColumn::make('view_hours')->sortable()
                    ->formatStateUsing(fn($state) => $state == abs($state - round($state, 2)) < 0.01  ? number_format($state, 0) . " Hour" : number_format($state, 2) . " Hour"),
                TextColumn::make('likes')->sortable(),
                TextColumn::make('dislikes')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListEngagements::route('/'),
            'create' => Pages\CreateEngagements::route('/create'),
            'edit' => Pages\EditEngagements::route('/{record}/edit'),
        ];
    }
}

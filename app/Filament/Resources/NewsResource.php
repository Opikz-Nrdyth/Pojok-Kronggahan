<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\News;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Categories;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\NewsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\NewsResource\RelationManagers;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = "News";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->placeholder('Enter the title'),

                        Textarea::make('description')
                            ->required()
                            ->placeholder('Enter the description'),

                        RichEditor::make('content')
                            ->required()
                            ->placeholder('Enter the content'),

                        FileUpload::make('thumbnail')
                            ->image() // Mengatur tipe file sebagai gambar
                            ->directory('images') // Folder penyimpanan dalam public/images
                            ->visibility('public') // Mengatur agar dapat diakses secara publik
                            ->required(),

                        Select::make('category_id')
                            ->label('Category')
                            ->required()
                            ->options(Categories::all()->pluck('name', 'id'))
                            ->searchable(),

                        Select::make('author')
                            ->required()
                            ->options(User::all()->pluck('name', 'email')) // Assuming 'email' is used for author
                            ->searchable(),

                        TextInput::make('engagements.clicks')
                            ->label('Clicks')
                            ->numeric()
                            ->disabled()
                            ->default(fn(?News $record) => $record && $record->engagements_relation ? $record->engagements_relation->clicks : 0), // Default ke 0 jika tidak ada relasi

                        TextInput::make('engagements.view_hours')
                            ->label('View Hours')
                            ->numeric()
                            ->disabled()
                            ->default(fn(?News $record) => $record && $record->engagements_relation ? $record->engagements_relation->view_hours : 0), // Default ke 0 jika tidak ada relasi

                        TextInput::make('engagements.likes')
                            ->label('Likes')
                            ->numeric()
                            ->disabled()
                            ->default(fn(?News $record) => $record && $record->engagements_relation ? $record->engagements_relation->likes : 0), // Default ke 0 jika tidak ada relasi

                        TextInput::make('engagements.dislikes')
                            ->label('Dislikes')
                            ->numeric()
                            ->disabled()
                            ->default(fn(?News $record) => $record && $record->engagements_relation ? $record->engagements_relation->dislikes : 0), // Default ke 0 jika tidak ada relasi

                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('description')->limit(50),
                TextColumn::make('category_relation.name') // Menggunakan relasi untuk menampilkan nama kategori
                    ->label('category')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('author')->sortable(),
                TextColumn::make('engagements_relation.clicks')->sortable()->label("clicks"),
                TextColumn::make('engagements_relation.view_hours')->sortable()->label("view hours"),
                TextColumn::make('engagements_relation.likes')->sortable()->label("likes"),
                TextColumn::make('engagements_relation.dislikes')->sortable()->label("dislike"),
                TextColumn::make('created_at')->sortable(),
                TextColumn::make('updated_at')->sortable(),
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}

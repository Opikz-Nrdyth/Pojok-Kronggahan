<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Users;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UsersResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UsersResource\RelationManagers;

class UsersResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = "Users";



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->unique(ignorable: fn($record) => $record)
                            ->placeholder("ex: zoro@example.com"),
                        TextInput::make('name')
                            ->required()
                            ->placeholder("Ex: Zoro"),
                        Select::make('role')
                            ->required()
                            ->options([
                                "Admin" => "Admin",
                                "User" => "User",
                            ])
                            ->required(),
                        TextInput::make("password")
                            ->required(fn(string $operation): bool => $operation === 'create')
                            ->password()
                            ->revealable(filament()->arePasswordsRevealable())
                            ->placeholder("ex: Zoro1234")
                            ->dehydrated(fn($state) => filled($state))
                            ->beforeStateDehydrated(function ($state) {
                                if (filled($state)) {
                                    return Hash::make($state);
                                }
                            })
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('email'),
                TextColumn::make('role')->sortable()->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Admin' => 'warning',
                        'User' => 'info'
                    }),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUsers::route('/create'),
            'edit' => Pages\EditUsers::route('/{record}/edit'),
        ];
    }
}

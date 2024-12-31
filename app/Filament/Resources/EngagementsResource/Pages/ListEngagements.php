<?php

namespace App\Filament\Resources\EngagementsResource\Pages;

use App\Filament\Resources\EngagementsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEngagements extends ListRecords
{
    protected static string $resource = EngagementsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\EngagementsResource\Pages;

use App\Filament\Resources\EngagementsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEngagements extends EditRecord
{
    protected static string $resource = EngagementsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

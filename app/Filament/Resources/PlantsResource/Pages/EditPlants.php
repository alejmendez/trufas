<?php

namespace App\Filament\Resources\PlantsResource\Pages;

use App\Filament\Resources\PlantsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlants extends EditRecord
{
    protected static string $resource = PlantsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

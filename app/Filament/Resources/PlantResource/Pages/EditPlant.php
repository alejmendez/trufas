<?php

namespace App\Filament\Resources\PlantResource\Pages;

use App\Filament\Resources\PlantResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Traits\RedirectToIndex;

class EditPlant extends EditRecord
{
    use RedirectToIndex;

    protected static string $resource = PlantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

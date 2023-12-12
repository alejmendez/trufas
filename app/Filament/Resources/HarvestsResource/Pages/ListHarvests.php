<?php

namespace App\Filament\Resources\HarvestsResource\Pages;

use App\Filament\Resources\HarvestsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHarvests extends ListRecords
{
    protected static string $resource = HarvestsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

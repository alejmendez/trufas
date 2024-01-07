<?php

namespace App\Filament\Resources\PlantResource\Pages;

use App\Filament\Resources\PlantResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Traits\RedirectToIndex;


class CreatePlant extends CreateRecord
{
    use RedirectToIndex;

    protected static string $resource = PlantResource::class;
}

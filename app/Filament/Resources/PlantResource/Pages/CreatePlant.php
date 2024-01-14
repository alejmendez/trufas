<?php

namespace App\Filament\Resources\PlantResource\Pages;

use App\Filament\Resources\PlantResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Traits\RedirectToIndex;
use App\Filament\Traits\PageRecordActions;

class CreatePlant extends CreateRecord
{
    use RedirectToIndex, PageRecordActions;

    protected static string $resource = PlantResource::class;
}

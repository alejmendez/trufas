<?php

namespace App\Filament\Resources\QuarterResource\Pages;

use App\Filament\Resources\QuarterResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Traits\RedirectToIndex;

class CreateQuarter extends CreateRecord
{
    use RedirectToIndex;

    protected static string $resource = QuarterResource::class;
}

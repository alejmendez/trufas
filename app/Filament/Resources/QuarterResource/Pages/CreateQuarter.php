<?php

namespace App\Filament\Resources\QuarterResource\Pages;

use App\Filament\Resources\QuarterResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Traits\RedirectToIndex;
use App\Filament\Traits\PageRecordActions;

class CreateQuarter extends CreateRecord
{
    use RedirectToIndex, PageRecordActions;

    protected static string $resource = QuarterResource::class;
}

<?php

namespace App\Filament\Resources\FieldResource\Pages;

use App\Filament\Resources\FieldResource;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Traits\RedirectToIndex;
use App\Filament\Traits\PageRecordActions;

class CreateField extends CreateRecord
{
    use RedirectToIndex, PageRecordActions;

    protected static string $resource = FieldResource::class;
}

<?php

namespace App\Filament\Resources\FieldResource\Pages;

use App\Filament\Resources\FieldResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Traits\RedirectToIndex;

class CreateField extends CreateRecord
{
    use RedirectToIndex;

    protected static string $resource = FieldResource::class;
}

<?php

namespace App\Filament\Admin\Resources\Personnels\Pages;

use App\Filament\Admin\Resources\Personnels\PersonnelResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePersonnel extends CreateRecord
{
    protected static string $resource = PersonnelResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

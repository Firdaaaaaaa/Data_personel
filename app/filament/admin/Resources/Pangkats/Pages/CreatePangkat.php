<?php

namespace App\Filament\Admin\Resources\Pangkats\Pages;

use App\Filament\Admin\Resources\Pangkats\PangkatResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePangkat extends CreateRecord
{
    protected static string $resource = PangkatResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
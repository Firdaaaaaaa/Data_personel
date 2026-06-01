<?php

namespace App\Filament\Admin\Resources\Polseks\Pages;

use App\Filament\Admin\Resources\Polseks\PolsekResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePolsek extends CreateRecord
{
    protected static string $resource = PolsekResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
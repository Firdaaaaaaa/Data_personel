<?php

namespace App\Filament\Admin\Resources\PendidikanUmums\Pages;

use App\Filament\Admin\Resources\PendidikanUmums\PendidikanUmumResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePendidikanUmum extends CreateRecord
{
    protected static string $resource = PendidikanUmumResource::class;
     protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

<?php

namespace App\Filament\Admin\Resources\PendidikanKejuruan\Pengembangans\Pages;

use App\Filament\Admin\Resources\PendidikanKejuruan\Pengembangans\PengembanganResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePengembangan extends CreateRecord
{
    protected static string $resource = PengembanganResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

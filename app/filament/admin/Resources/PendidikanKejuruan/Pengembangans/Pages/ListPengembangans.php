<?php

namespace App\Filament\Admin\Resources\PendidikanKejuruan\Pengembangans\Pages;

use App\Filament\Admin\Resources\PendidikanKejuruan\Pengembangans\PengembanganResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPengembangans extends ListRecords
{
    protected static string $resource = PengembanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

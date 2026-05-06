<?php

namespace App\Filament\Admin\Resources\RekapDataPersonels\Pages;

use App\Filament\Admin\Resources\RekapDataPersonels\RekapDataPersonelResource;
use Filament\Resources\Pages\ListRecords;

class ListRekapDataPersonels extends ListRecords
{
    protected static string $resource = RekapDataPersonelResource::class;

    protected function getHeaderActions(): array
    {
        return []; // ❌ tombol create dihapus
    }
}
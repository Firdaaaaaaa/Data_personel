<?php

namespace App\Filament\Admin\Resources\PendidikanKejuruan\Pengembangans\Pages;

use App\Filament\Admin\Resources\PendidikanKejuruan\Pengembangans\PengembanganResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPengembangan extends EditRecord
{
    protected static string $resource = PengembanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

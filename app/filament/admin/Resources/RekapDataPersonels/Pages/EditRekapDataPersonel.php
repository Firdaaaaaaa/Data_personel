<?php

namespace App\Filament\Admin\Resources\RekapDataPersonels\Pages;

use App\Filament\Admin\Resources\RekapDataPersonels\RekapDataPersonelResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRekapDataPersonel extends EditRecord
{
    protected static string $resource = RekapDataPersonelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

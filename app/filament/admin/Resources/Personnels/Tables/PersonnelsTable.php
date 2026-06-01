<?php

namespace App\Filament\Admin\Resources\Personnels\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;

use Filament\Tables\Table;
use Filament\Tables\Enums\RecordActionsPosition;

class PersonnelsTable
{
    public static function configure(Table $table): Table
    {
        return $table

            ->columns([
                //
            ])

            // FILTER DIHAPUS DARI PERSONEL
            ->filters([])

            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])

            ->recordActionsPosition(RecordActionsPosition::AfterColumns)

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
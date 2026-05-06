<?php

namespace App\Filament\Admin\Resources\PendidikanPembentukans\Tables;

use Filament\Tables;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class PendidikanPembentukansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('Nomor')
                    ->sortable(),

                Tables\Columns\TextColumn::make('nama_pendidikan')
                    ->label('Nama Pendidikan')
                    ->searchable(),

                Tables\Columns\TextColumn::make('keterangan')
                    ->label('Keterangan')
                    ->wrap(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),

                EditAction::make(),

                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
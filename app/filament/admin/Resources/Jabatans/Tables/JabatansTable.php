<?php

namespace App\Filament\Admin\Resources\Jabatans\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class JabatansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no')
                    ->label('No')
                    ->rowIndex(),

                TextColumn::make('nama')
                    ->label('Nama Jabatan')
                    ->searchable(),

                TextColumn::make('urutan')
                    ->label('Urutan')
                    ->sortable(),

                TextColumn::make('atasan.nama')
                    ->label('Jabatan Atasan')
                    ->default('-'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->defaultSort('urutan');
    }
}
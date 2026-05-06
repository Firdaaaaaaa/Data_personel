<?php

namespace App\Filament\Admin\Resources\PendidikanKejuruan\Pengembangans\Tables;

use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class PengembangansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')
                    ->label('No')
                    ->rowIndex(),

                TextColumn::make('nama_pendidikan')
                    ->label('Dikjur / Dikbang')
                    ->searchable(),

                TextColumn::make('kategori')
                    ->label('Kategori'),

                TextColumn::make('keterangan')
                    ->label('Keterangan')
                    ->limit(30),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),   // 👈 tambah view
                EditAction::make(),
                DeleteAction::make(), // 👈 tambah delete
            ])
            ->toolbarActions([
               
            ]);
    }
}
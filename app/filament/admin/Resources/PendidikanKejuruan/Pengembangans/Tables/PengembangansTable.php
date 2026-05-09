<?php

namespace App\Filament\Admin\Resources\PendidikanKejuruan\Pengembangans\Tables;

use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class PengembangansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')
                    ->label('No')
                    ->rowIndex(),

                TextColumn::make('nama_pengembangan')
                    ->label('Dikjur / Dikbang')
                    ->searchable(),

                TextColumn::make('kategori')
                    ->label('Kategori'),

                TextColumn::make('keterangan')
                    ->label('Keterangan')
                    ->limit(30),
            ])
            ->filters([
                SelectFilter::make('keterangan')
                    ->label('Tahun')
                    ->options(
                        \App\Models\PendidikanKejuruan\Pengembangan::query()
                            ->distinct()
                            ->orderBy('keterangan')
                            ->pluck('keterangan', 'keterangan')
                            ->toArray()
                    ),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([

            ]);
    }
}
<?php

namespace App\Filament\Admin\Resources\PendidikanUmums\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PendidikanUmumsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('No')
                    ->rowIndex(),

                TextColumn::make('jenjang_pendidikan')
                    ->label('Jenjang Pendidikan')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('jurusan') // ✅ FIX: tampilkan jurusan
                    ->label('Jurusan')
                    ->searchable()
                    ->placeholder('-') // kalau kosong tampil "-"
                    ->wrap(), // biar teks panjang turun ke bawah
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}
<?php

namespace App\Filament\Admin\Resources\PendidikanUmums\Tables;

use App\Models\PendidikanUmum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
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


                TextColumn::make('keterangan')
                    ->label('Keterangan')
                    ->searchable()
                    ->placeholder('-')
                    ->wrap(),

            ])

            ->filters([
                SelectFilter::make('keterangan')
                    ->label('Filter Tahun')
                    ->options(
                        PendidikanUmum::query()
                            ->pluck('keterangan', 'keterangan')
                            ->toArray()
                    ),
            ])

            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}
<?php

namespace App\Filament\Admin\Resources\Polseks\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;

class PolseksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_polsek')
                    ->label('Nama Polsek')
                    ->searchable()
                    ->sortable(),
            ])
            ->actions([
            ViewAction::make()
        ->url(fn ($record) => route('filament.admin.resources.polseks.view', $record)),

                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}
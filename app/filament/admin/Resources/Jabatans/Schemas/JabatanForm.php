<?php

namespace App\Filament\Admin\Resources\Jabatans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class JabatanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ✅ sesuai database
                TextInput::make('nama')
                    ->label('Nama Jabatan')
                    ->required()
                    ->maxLength(255),

                TextInput::make('urutan')
                    ->label('Urutan')
                    ->numeric()
                    ->required(),

                Select::make('parent_id')
                    ->label('Jabatan Atasan')
                    ->relationship('parent', 'nama')
                    ->searchable()
                    ->nullable(),

            ]);
    }
}
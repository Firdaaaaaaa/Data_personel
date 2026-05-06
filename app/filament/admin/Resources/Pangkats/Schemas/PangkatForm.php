<?php

namespace App\Filament\Admin\Resources\Pangkats\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PangkatForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('nama_pangkat')
                    ->label('Nama Pangkat')
                    ->required()
                    ->maxLength(255),

                TextInput::make('golongan')
                    ->label('Golongan')
                    ->required()
                    ->maxLength(50),


            ]);
    }
}

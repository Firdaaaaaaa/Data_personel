<?php

namespace App\Filament\Admin\Resources\Polseks\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class PolsekForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_polsek')
                    ->label('Nama Polsek')
                    ->required()
                    ->maxLength(255),
            ]);
    }
}
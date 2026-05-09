<?php

namespace App\Filament\Admin\Resources\Personnels\Pages;

use App\Filament\Admin\Resources\Personnels\PersonnelResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Actions\EditAction;

class ViewPersonnel extends ViewRecord
{
    protected static string $resource = PersonnelResource::class;

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->columns(2)

            ->components([

                // ✅ FOTO FIX
                ImageEntry::make('foto')
                    ->label('Foto')
                    ->getStateUsing(fn ($record) =>
                        $record->foto
                            ? asset('storage/' . $record->foto)
                            : asset('images/default-user.png')
                    )
                    ->circular()
                    ->size(150)
                    ->columnSpanFull(),

                TextEntry::make('nama')
                    ->label('Nama'),

                TextEntry::make('nrp')
                    ->label('NRP'),

                TextEntry::make('pangkat.nama_pangkat')
                    ->label('Pangkat'),

                TextEntry::make('jabatan.nama')
                    ->label('Jabatan'),

                TextEntry::make('dikum.jenjang_pendidikan')
                    ->label('Dikum'),

                TextEntry::make('diktuk.nama_pendidikan')
                    ->label('Diktuk'),

                // ✅ FIX DIKJUR
                TextEntry::make('dikjur.nama_pengembangan')
                    ->label('Dikjur/Dikbang')
                    ->default('-'),

                TextEntry::make('polsek.nama_polsek')
                    ->label('Polsek')
                    ->default('-'),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
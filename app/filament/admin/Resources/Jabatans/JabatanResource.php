<?php

namespace App\Filament\Admin\Resources\Jabatans;

use App\Filament\Admin\Resources\Jabatans\Pages\CreateJabatan;
use App\Filament\Admin\Resources\Jabatans\Pages\EditJabatan;
use App\Filament\Admin\Resources\Jabatans\Pages\ListJabatans;
use App\Filament\Admin\Resources\Jabatans\Pages\ViewJabatan;
use App\Filament\Admin\Resources\Jabatans\Schemas\JabatanForm;
use App\Filament\Admin\Resources\Jabatans\Schemas\JabatanInfolist; // ✅ TAMBAH
use App\Filament\Admin\Resources\Jabatans\Tables\JabatansTable;
use App\Models\Jabatan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class JabatanResource extends Resource
{
    protected static ?string $model = Jabatan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedIdentification;

    protected static ?string $navigationLabel = 'Jabatan';
    protected static ?string $modelLabel = 'Jabatan';
    protected static ?string $pluralModelLabel = 'Jabatan';
    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return JabatanForm::configure($schema);
    }

    // 🔥 INI YANG BIKIN VIEW BERUBAH
    public static function infolist(Schema $schema): Schema
    {
        return JabatanInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return JabatansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListJabatans::route('/'),
            'create' => CreateJabatan::route('/create'),
            'edit' => EditJabatan::route('/{record}/edit'),
            'view' => ViewJabatan::route('/{record}'),
        ];
    }
}
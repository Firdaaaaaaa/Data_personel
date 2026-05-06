<?php

namespace App\Filament\Admin\Resources\PendidikanUmums;

use App\Filament\Admin\Resources\PendidikanUmums\Pages\CreatePendidikanUmum;
use App\Filament\Admin\Resources\PendidikanUmums\Pages\EditPendidikanUmum;
use App\Filament\Admin\Resources\PendidikanUmums\Pages\ListPendidikanUmums;
use App\Filament\Admin\Resources\PendidikanUmums\Pages\ViewPendidikanUmum;
use App\Filament\Admin\Resources\PendidikanUmums\Schemas\PendidikanUmumForm;
use App\Filament\Admin\Resources\PendidikanUmums\Schemas\PendidikanUmumInfolist;
use App\Filament\Admin\Resources\PendidikanUmums\Tables\PendidikanUmumsTable;
use App\Models\PendidikanUmum;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PendidikanUmumResource extends Resource
{
    protected static ?string $model = PendidikanUmum::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedAcademicCap;

    protected static ?string $navigationLabel = 'Pendidikan Umum';
    protected static ?string $modelLabel = 'Pendidikan Umum';
    protected static ?string $pluralModelLabel = 'Pendidikan Umum';
    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return PendidikanUmumForm::configure($schema);
    }

    // ✅ INI WAJIB
    public static function infolist(Schema $schema): Schema
    {
        return PendidikanUmumInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PendidikanUmumsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPendidikanUmums::route('/'),
            'create' => CreatePendidikanUmum::route('/create'),
            'edit' => EditPendidikanUmum::route('/{record}/edit'),
            'view' => ViewPendidikanUmum::route('/{record}'), // ✅ WAJIB
        ];
    }
}
<?php

namespace App\Filament\Admin\Resources\Pangkats;

use App\Filament\Admin\Resources\Pangkats\Pages\CreatePangkat;
use App\Filament\Admin\Resources\Pangkats\Pages\EditPangkat;
use App\Filament\Admin\Resources\Pangkats\Pages\ListPangkats;
use App\Filament\Admin\Resources\Pangkats\Pages\ViewPangkat;
use App\Filament\Admin\Resources\Pangkats\Schemas\PangkatForm;
use App\Filament\Admin\Resources\Pangkats\Schemas\PangkatInfolist;
use App\Filament\Admin\Resources\Pangkats\Tables\PangkatsTable;
use App\Models\Pangkat;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PangkatResource extends Resource
{
    protected static ?string $model = Pangkat::class;

    // ⭐ ICON LEBIH COCOK (BADGE)
    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedIdentification;

    // ✅ supaya tidak Pangkats
    protected static ?string $navigationLabel = 'Pangkat';
    protected static ?string $modelLabel = 'Pangkat';
    protected static ?string $pluralModelLabel = 'Pangkat';

    // urutan sidebar
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return PangkatForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PangkatInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PangkatsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPangkats::route('/'),
            'create' => CreatePangkat::route('/create'),
            'view' => ViewPangkat::route('/{record}'),
            'edit' => EditPangkat::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Admin\Resources\PendidikanKejuruan\Pengembangans;

use App\Filament\Admin\Resources\PendidikanKejuruan\Pengembangans\Pages\CreatePengembangan;
use App\Filament\Admin\Resources\PendidikanKejuruan\Pengembangans\Pages\EditPengembangan;
use App\Filament\Admin\Resources\PendidikanKejuruan\Pengembangans\Pages\ListPengembangans;
use App\Filament\Admin\Resources\PendidikanKejuruan\Pengembangans\Pages\ViewPengembangan;
use App\Filament\Admin\Resources\PendidikanKejuruan\Pengembangans\Schemas\PengembanganForm;
use App\Filament\Admin\Resources\PendidikanKejuruan\Pengembangans\Tables\PengembangansTable;
use App\Models\PendidikanKejuruan\Pengembangan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PengembanganResource extends Resource
{
    protected static ?string $model = Pengembangan::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedAcademicCap;

    protected static ?string $navigationLabel =
        'Pendidikan Kejuruan / Pengembangan';

    protected static ?string $modelLabel =
        'Pendidikan Kejuruan / Pengembangan';

    protected static ?string $pluralModelLabel =
        'Pendidikan Kejuruan / Pengembangan';

    protected static ?int $navigationSort = 6;

    public static function form(Schema $schema): Schema
    {
        return PengembanganForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PengembangansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPengembangans::route('/'),
            'create' => CreatePengembangan::route('/create'),
            'view' => ViewPengembangan::route('/{record}'),
            'edit' => EditPengembangan::route('/{record}/edit'),
        ];
    }
}
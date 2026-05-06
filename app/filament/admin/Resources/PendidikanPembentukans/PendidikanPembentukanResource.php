<?php

namespace App\Filament\Admin\Resources\PendidikanPembentukans;

use App\Filament\Admin\Resources\PendidikanPembentukans\Pages\CreatePendidikanPembentukan;
use App\Filament\Admin\Resources\PendidikanPembentukans\Pages\EditPendidikanPembentukan;
use App\Filament\Admin\Resources\PendidikanPembentukans\Pages\ListPendidikanPembentukans;
use App\Filament\Admin\Resources\PendidikanPembentukans\Pages\ViewPendidikanPembentukan;
use App\Filament\Admin\Resources\PendidikanPembentukans\Schemas\PendidikanPembentukanForm;
use App\Filament\Admin\Resources\PendidikanPembentukans\Tables\PendidikanPembentukansTable;
use App\Models\PendidikanPembentukan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PendidikanPembentukanResource extends Resource
{
    protected static ?string $model = PendidikanPembentukan::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedAcademicCap;

    protected static ?string $navigationLabel = 'Pendidikan Pembentukan';
    protected static ?string $modelLabel = 'Pendidikan Pembentukan';
    protected static ?string $pluralModelLabel = 'Pendidikan Pembentukan';
    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return PendidikanPembentukanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PendidikanPembentukansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPendidikanPembentukans::route('/'),
            'create' => CreatePendidikanPembentukan::route('/create'),
            'view' => ViewPendidikanPembentukan::route('/{record}'),
            'edit' => EditPendidikanPembentukan::route('/{record}/edit'),
        ];
    }
}
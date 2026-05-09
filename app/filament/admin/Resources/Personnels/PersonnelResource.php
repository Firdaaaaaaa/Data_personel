<?php

namespace App\Filament\Admin\Resources\Personnels;

use App\Filament\Admin\Resources\Personnels\Pages\CreatePersonnel;
use App\Filament\Admin\Resources\Personnels\Pages\EditPersonnel;
use App\Filament\Admin\Resources\Personnels\Pages\ListPersonnels;
use App\Filament\Admin\Resources\Personnels\Pages\ViewPersonnel;
use App\Models\Personnel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;

use Illuminate\Database\Eloquent\Builder;

class PersonnelResource extends Resource
{
    protected static ?string $model = Personnel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUser;

    protected static ?string $recordTitleAttribute = 'nama';

    protected static ?string $navigationLabel = 'Personel';
    protected static ?string $modelLabel = 'Personel';
    protected static ?string $pluralModelLabel = 'Personel';
    protected static ?int $navigationSort = 1;

    // ================= FORM =================
    public static function form(Schema $schema): Schema
    {
        return $schema->schema([

            TextInput::make('nama')
                ->label('Nama')
                ->required(),

            TextInput::make('nrp')
                ->label('NRP')
                ->required(),

            Select::make('pangkat_id')
                ->label('Pangkat')
                ->relationship('pangkat', 'nama_pangkat')
                ->searchable()
                ->preload()
                ->required(),

            Select::make('jabatan_id')
                ->label('Jabatan')
                ->relationship('jabatan', 'nama')
                ->searchable()
                ->preload()
                ->required(),

            Select::make('dikum_id')
                ->label('Pendidikan Umum')
                ->relationship('dikum', 'jenjang_pendidikan')
                ->searchable()
                ->preload(),

            Select::make('diktuk_id')
                ->label('Pendidikan Pembentukan')
                ->relationship('diktuk', 'nama_pendidikan')
                ->searchable()
                ->preload(),

            Select::make('dikjur_id')
                ->label('Pengembangan')
                ->relationship('dikjur', 'nama_pengembangan')
                ->searchable()
                ->preload(),

            Select::make('polsek_id')
                ->label('Polsek')
                ->relationship('polsek', 'nama_polsek')
                ->searchable()
                ->preload()
                ->required(),

            // ================= FOTO =================
            FileUpload::make('foto')
                ->label('Foto')
                ->image()
                ->disk('public')
                ->directory('personnels')
                ->visibility('public')
                ->imagePreviewHeight('120')
                ->columnSpanFull(),
        ]);
    }

    // ================= TABLE =================
    public static function table(Table $table): Table
    {
        return $table

            // ================= QUERY =================
            ->modifyQueryUsing(function (Builder $query) {

                $query->join('jabatans', 'personnels.jabatan_id', '=', 'jabatans.id')
                    ->select('personnels.*', 'jabatans.urutan');

                // ✅ FILTER DARI REKAP POLSEK
                $polsekId = data_get(
                    request()->input('tableFilters'),
                    'polsek_id.value'
                );

                if ($polsekId) {
                    $query->where('personnels.polsek_id', $polsekId);
                }

                return $query->orderBy('jabatans.urutan', 'asc');
            })

            ->columns([

                // ================= FOTO =================
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->getStateUsing(fn ($record) => asset('storage/' . $record->foto))
                    ->circular()
                    ->size(50),

                TextColumn::make('id')
                    ->label('No')
                    ->rowIndex(),

                TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('nrp')
                    ->label('NRP')
                    ->searchable(),

                TextColumn::make('pangkat.nama_pangkat')
                    ->label('Pangkat'),

                TextColumn::make('jabatan.nama')
                    ->label('Jabatan'),

                TextColumn::make('dikum.jenjang_pendidikan')
                    ->label('Dikum'),

                TextColumn::make('diktuk.nama_pendidikan')
                    ->label('Diktuk'),

                TextColumn::make('dikjur.nama_pengembangan')
                    ->label('Dikjur'),

                TextColumn::make('polsek.nama_polsek')
                    ->label('Polsek'),
            ])

            ->filters([
                SelectFilter::make('polsek_id')
                    ->label('Polsek')
                    ->relationship('polsek', 'nama_polsek')
                    ->searchable(),
            ])

            ->recordActions([
                \Filament\Actions\ViewAction::make(),
                \Filament\Actions\EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
            ]);
    }

    // ================= RELATIONS =================
    public static function getRelations(): array
    {
        return [];
    }

    // ================= PAGES =================
    public static function getPages(): array
    {
        return [
            'index' => ListPersonnels::route('/'),
            'create' => CreatePersonnel::route('/create'),
            'view' => ViewPersonnel::route('/{record}'),
            'edit' => EditPersonnel::route('/{record}/edit'),
        ];
    }
}
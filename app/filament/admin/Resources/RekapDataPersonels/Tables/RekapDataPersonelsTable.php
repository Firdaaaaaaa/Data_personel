<?php

namespace App\Filament\Admin\Resources\RekapDataPersonels\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use App\Exports\PersonnelExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class RekapDataPersonelsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                return $query
                    ->join('polseks', 'personnels.polsek_id', '=', 'polseks.id')
                    ->selectRaw('
                        MIN(personnels.id) as id,
                        polseks.nama_polsek,
                        personnels.polsek_id,
                        COUNT(*) as jumlah
                    ')
                    ->groupBy('personnels.polsek_id', 'polseks.nama_polsek')
                    ->orderBy('polseks.nama_polsek', 'asc');
            })

            ->columns([
                TextColumn::make('nama_polsek')
                    ->label('Nama Polsek')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('jumlah')
                    ->label('Jumlah Personel')
                    ->sortable()
                    ->badge()
                    ->color('success'),
            ])

            ->recordActions([

                // ✅ LIHAT → MASUK KE TABLE PERSONEL (FILTER OTOMATIS)
                Action::make('lihat')
                    ->label('Lihat')
                    ->icon('heroicon-o-eye')
                    ->url(fn ($record) => route(
                        'filament.admin.resources.personnels.index',
                        [
                            'tableFilters[polsek_id][value]' => $record->polsek_id,
                        ]
                    )),

                // ✅ EXPORT EXCEL PER POLSEK
                Action::make('export_excel')
                    ->label('Export Excel')
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('success')
                    ->action(function ($record) {

                        $personnels = \App\Models\Personnel::with([
                            'pangkat', 'jabatan', 'dikum', 'diktuk', 'dikjur', 'polsek'
                        ])
                        ->where('polsek_id', $record->polsek_id)
                        ->get();

                        $namaPolsek = $record->nama_polsek ?? 'polsek';

                        return Excel::download(
                            new PersonnelExport($personnels),
                            'personnel_' . str_replace(' ', '_', $namaPolsek) . '_' . date('Y-m-d') . '.xlsx'
                        );
                    }),

                // ✅ EXPORT PDF PER POLSEK
                Action::make('export_pdf')
                    ->label('Export PDF')
                    ->icon('heroicon-o-document-text')
                    ->color('danger')
                    ->action(function ($record) {

                        $personnels = \App\Models\Personnel::with([
                            'pangkat', 'jabatan', 'dikum', 'diktuk', 'dikjur', 'polsek'
                        ])
                        ->where('polsek_id', $record->polsek_id)
                        ->get();

                        $namaPolsek = $record->nama_polsek ?? 'Polsek';

                        $pdf = Pdf::loadView('exports.personnel-pdf', [
                            'personnels' => $personnels,
                            'namaPolsek' => $namaPolsek,
                            'totalData' => $personnels->count(),
                            'tanggalCetak' => now()->format('d-m-Y H:i:s'),
                        ])->setPaper('A4', 'landscape');

                        return response()->streamDownload(
                            fn () => print($pdf->output()),
                            'personnel_' . str_replace(' ', '_', $namaPolsek) . '_' . date('Y-m-d') . '.pdf'
                        );
                    }),
            ]);
    }
}
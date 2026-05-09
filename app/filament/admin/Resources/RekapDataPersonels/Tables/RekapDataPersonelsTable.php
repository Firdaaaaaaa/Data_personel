<?php

namespace App\Filament\Admin\Resources\RekapDataPersonels\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Personnel;
use App\Exports\PersonnelExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class RekapDataPersonelsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->query(
                Personnel::query()
                    ->with('polsek')
                    ->whereNotNull('polsek_id')
                    ->selectRaw('
                        MIN(id) as id,
                        polsek_id,
                        COUNT(id) as jumlah
                    ')
                    ->groupBy('polsek_id')
            )

            ->columns([

                TextColumn::make('polsek.nama_polsek')
                    ->label('Nama Polsek')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('jumlah')
                    ->label('Jumlah Personel')
                    ->badge()
                    ->color('success')
                    ->sortable(),
            ])

            ->recordActions([

                // ================= LIHAT =================
                Action::make('lihat')
                    ->label('Lihat')
                    ->icon('heroicon-o-eye')
                    ->url(fn ($record) => route(
                        'filament.admin.resources.personnels.index',
                        [
                            'tableFilters[polsek_id][value]' => $record->polsek_id,
                        ]
                    )),

                // ================= EXPORT EXCEL =================
                Action::make('export_excel')
                    ->label('Export Excel')
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('success')
                    ->action(function ($record) {

                        $personnels = Personnel::with([
                            'pangkat',
                            'jabatan',
                            'dikum',
                            'diktuk',
                            'dikjur',
                            'polsek',
                        ])
                        ->where('polsek_id', $record->polsek_id)
                        ->get();

                        $namaPolsek = $record->polsek?->nama_polsek ?? 'polsek';

                        return Excel::download(
                            new PersonnelExport($personnels),
                            'personnel_' . str_replace(' ', '_', $namaPolsek) . '.xlsx'
                        );
                    }),

                // ================= EXPORT PDF =================
                Action::make('export_pdf')
                    ->label('Export PDF')
                    ->icon('heroicon-o-document-text')
                    ->color('danger')
                    ->action(function ($record) {

                        $personnels = Personnel::with([
                            'pangkat',
                            'jabatan',
                            'dikum',
                            'diktuk',
                            'dikjur',
                            'polsek',
                        ])
                        ->where('polsek_id', $record->polsek_id)
                        ->get();

                        $namaPolsek = $record->polsek?->nama_polsek ?? 'Polsek';

                        $pdf = Pdf::loadView('exports.personnel-pdf', [
                            'personnels' => $personnels,
                            'namaPolsek' => $namaPolsek,
                            'totalData' => $personnels->count(),
                            'tanggalCetak' => now()->format('d-m-Y H:i:s'),
                        ])->setPaper('A4', 'landscape');

                        return response()->streamDownload(
                            fn () => print($pdf->output()),
                            'personnel_' . str_replace(' ', '_', $namaPolsek) . '.pdf'
                        );
                    }),
            ]);
    }
}
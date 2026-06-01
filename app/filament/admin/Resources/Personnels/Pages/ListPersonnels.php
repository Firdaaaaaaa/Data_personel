<?php

namespace App\Filament\Admin\Resources\Personnels\Pages;

use App\Exports\PersonnelExport;
use App\Filament\Admin\Resources\Personnels\PersonnelResource;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Facades\Excel;

class ListPersonnels extends ListRecords
{
    protected static string $resource = PersonnelResource::class;

    protected function getHeaderActions(): array
    {
        // 🔥 DETEKSI: kalau dari Rekap
        $isFromRekap = request()->has('tableFilters');

        if ($isFromRekap) {
            return [];
        }

        return [
            CreateAction::make(),

            Action::make('export_excel')
                ->label('Export Excel')
                ->icon('heroicon-o-arrow-down-tray')
                ->action(function () {

                    $query = $this->getFilteredTableQuery();

                    $data = $query->with([
                        'pangkat',
                        'jabatan',
                        'dikum',
                        'diktuk',
                        'dikjur',
                        'polsek'
                    ])->get();

                    return Excel::download(
                        new PersonnelExport($data),
                        'data-personel.xlsx'
                    );
                }),

            Action::make('export_pdf')
                ->label('Export PDF')
                ->icon('heroicon-o-document')
                ->action(function () {

                    $query = $this->getFilteredTableQuery();

                    $personnels = $query->with([
                        'pangkat',
                        'jabatan',
                        'dikum',
                        'diktuk',
                        'dikjur',
                        'polsek'
                    ])
                    ->limit(100)
                    ->get();

                    $pdf = Pdf::loadView('exports.personnel-pdf', [
                        'personnels' => $personnels,
                    ]);

                    return response()->streamDownload(
                        fn () => print($pdf->output()),
                        'data-personel.pdf'
                    );
                }),
        ];
    }

    // 🔥 FIX FILTER DARI REKAP
    protected function getTableQuery(): Builder
    {
        $query = parent::getTableQuery();

        // ================= POLSEK =================
        if ($polsek = request('tableFilters.polsek_id.value')) {
            $query->where('polsek_id', $polsek);
        }

        // ================= DIKTUK =================
        if (request('tableFilters.diktuk.value') === 'sudah') {
            $query->whereNotNull('diktuk_id');
        }

        if (request('tableFilters.diktuk.value') === 'belum') {
            $query->whereNull('diktuk_id');
        }

        // ================= DIKBANG =================
        if (request('tableFilters.dikbang.value') === 'sudah') {
            $query->whereNotNull('dikjur_id');
        }

        if (request('tableFilters.dikbang.value') === 'belum') {
            $query->whereNull('dikjur_id');
        }

        // ================= PENDIDIKAN =================
        if ($pendidikan = request('tableFilters.pendidikan.value')) {

            $query->whereHas('dikum', function ($q) use ($pendidikan) {

                if ($pendidikan === 'SMA/SMK') {
                    $q->whereIn('jenjang_pendidikan', [
                        'SMA',
                        'SMK',
                        'SMA/SMK',
                        'SMA/Sederajat'
                    ]);
                } else {
                    $q->where('jenjang_pendidikan', $pendidikan);
                }

            });
        }

        return $query;
    }
}
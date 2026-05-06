<?php

namespace App\Filament\Admin\Resources\Personnels\Pages;

use App\Exports\PersonnelExport;
use App\Filament\Admin\Resources\Personnels\PersonnelResource;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;

class ListPersonnels extends ListRecords
{
    protected static string $resource = PersonnelResource::class;

    protected function getHeaderActions(): array
    {
        // 🔥 DETEKSI: kalau dari Rekap (ada filter polsek)
        $isFromRekap = request()->has('tableFilters');

        // ❌ kalau dari Rekap → sembunyikan semua tombol
        if ($isFromRekap) {
            return [];
        }

        // ✅ kalau buka menu Personel biasa → tampilkan semua
        return [
            CreateAction::make(),

            // ✅ EXPORT EXCEL (ikut filter table)
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

            // ✅ EXPORT PDF (ikut filter table)
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
                    ->limit(100) // biar aman PDF
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
}
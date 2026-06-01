<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;

use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class PersonnelExport implements FromCollection, WithHeadings, WithEvents, ShouldAutoSize, WithDrawings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    // ✅ DATA
    public function collection(): Collection
    {
        return $this->data->values()->map(function ($personnel, $index) {
            return [
                $index + 1,
                $personnel->nama,
                $personnel->nrp,
                $personnel->pangkat?->nama_pangkat,
                $personnel->jabatan?->nama,
                $personnel->dikum?->jenjang_pendidikan,
                $personnel->diktuk?->nama_pendidikan,

                // 🔥 FIX DI SINI (WAJIB)
                $personnel->dikjur?->nama_pengembangan,

                $personnel->polsek?->nama_polsek,
                '', // kolom foto
            ];
        });
    }

    // ✅ HEADER
    public function headings(): array
    {
        return [
            ['DATA PERSONEL'],
            ['No', 'Nama', 'NRP', 'Pangkat', 'Jabatan', 'Dikum', 'Diktuk', 'Dikjur/Dikbang', 'Polsek', 'Foto']
        ];
    }

    // 🔥 GAMBAR
    public function drawings()
    {
        $drawings = [];

        foreach ($this->data->values() as $index => $personnel) {

            if ($personnel->foto && file_exists(storage_path('app/public/' . $personnel->foto))) {

                $drawing = new Drawing();
                $drawing->setName($personnel->nama);
                $drawing->setDescription('Foto');
                $drawing->setPath(storage_path('app/public/' . $personnel->foto));
                $drawing->setHeight(60);

                $row = $index + 3;

                $drawing->setCoordinates('J' . $row);

                $drawings[] = $drawing;
            }
        }

        return $drawings;
    }

    // ✅ STYLE
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function($event) {

                $sheet = $event->sheet->getDelegate();

                $sheet->mergeCells('A1:J1');

                $sheet->getStyle('A1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 14],
                    'alignment' => ['horizontal' => 'center'],
                ]);

                $sheet->getStyle('A2:J2')->getFont()->setBold(true);

                $lastRow = $sheet->getHighestRow();

                $sheet->getStyle("A2:J{$lastRow}")->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                ]);

                for ($i = 3; $i <= $lastRow; $i++) {
                    $sheet->getRowDimension($i)->setRowHeight(50);
                }

                $sheet->getStyle("A2:A{$lastRow}")->getAlignment()->setHorizontal('center');
                $sheet->getStyle("C2:C{$lastRow}")->getAlignment()->setHorizontal('center');
            }
        ];
    }
}
<x-filament::page>

    <div style="
        background:white;
        border-radius:12px;
        box-shadow:0 2px 10px rgba(0,0,0,0.08);
        overflow:hidden;
        border:1px solid #e5e7eb;
    ">

        <!-- HEADER -->
        <div style="
            background:#f59e0b;
            color:white;
            padding:20px;
        ">
            <h2 style="
                margin:0;
                font-size:20px;
                font-weight:bold;
            ">
                Detail Rekap Polsek
            </h2>
        </div>

        <!-- ISI -->
        <div style="padding:25px;">

            <div style="overflow-x:auto;">

                <table style="
                    width:100%;
                    border-collapse:collapse;
                    text-align:center;
                    font-size:14px;
                    color:#374151;
                ">

                    <thead>
                        <tr style="background:#f3f4f6;">
                            <th rowspan="2" style="border:1px solid #d1d5db;padding:12px;">JUMLAH PERSONEL</th>
                            <th colspan="2" style="border:1px solid #d1d5db;padding:12px;">DIKTUK</th>
                            <th colspan="2" style="border:1px solid #d1d5db;padding:12px;">DIKBANG / DIKJUR</th>
                            <th colspan="4" style="border:1px solid #d1d5db;padding:12px;">DIKUM TERAKHIR</th>
                        </tr>

                        <tr style="background:#f9fafb;">
                            <th style="border:1px solid #d1d5db;padding:10px;">SUDAH</th>
                            <th style="border:1px solid #d1d5db;padding:10px;">BELUM</th>
                            <th style="border:1px solid #d1d5db;padding:10px;">SUDAH</th>
                            <th style="border:1px solid #d1d5db;padding:10px;">BELUM</th>
                            <th style="border:1px solid #d1d5db;padding:10px;">SMA / SMK</th>
                            <th style="border:1px solid #d1d5db;padding:10px;">D3</th>
                            <th style="border:1px solid #d1d5db;padding:10px;">S1</th>
                            <th style="border:1px solid #d1d5db;padding:10px;">S2</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr style="background:white;">

                            <td style="border:1px solid #d1d5db;padding:12px;">
                                <a href="{{ route('filament.admin.resources.personnels.index', [
                                    'tableFilters' => [
                                        'polsek_id' => ['value' => $polsek->id],
                                    ]
                                ]) }}"
                                style="font-weight:700; text-decoration:none; color:#111827;">
                                    {{ $rekap['jumlah_personel'] }}
                                </a>
                            </td>

                            <td style="border:1px solid #d1d5db;">
                                <a href="{{ route('filament.admin.resources.personnels.index', [
                                    'tableFilters' => [
                                        'polsek_id' => ['value' => $polsek->id],
                                        'diktuk' => ['value' => 'sudah'],
                                    ]
                                ]) }}"
                                style="font-weight:700; color:#111827;">
                                    {{ $rekap['diktuk_sudah'] }}
                                </a>
                            </td>

                            <td style="border:1px solid #d1d5db;">
                                <a href="{{ route('filament.admin.resources.personnels.index', [
                                    'tableFilters' => [
                                        'polsek_id' => ['value' => $polsek->id],
                                        'diktuk' => ['value' => 'belum'],
                                    ]
                                ]) }}"
                                style="font-weight:700; color:#111827;">
                                    {{ $rekap['diktuk_belum'] }}
                                </a>
                            </td>

                            <td style="border:1px solid #d1d5db;">
                                <a href="{{ route('filament.admin.resources.personnels.index', [
                                    'tableFilters' => [
                                        'polsek_id' => ['value' => $polsek->id],
                                        'dikbang' => ['value' => 'sudah'],
                                    ]
                                ]) }}"
                                style="font-weight:700; color:#111827;">
                                    {{ $rekap['dikbang_sudah'] }}
                                </a>
                            </td>

                            <td style="border:1px solid #d1d5db;">
                                <a href="{{ route('filament.admin.resources.personnels.index', [
                                    'tableFilters' => [
                                        'polsek_id' => ['value' => $polsek->id],
                                        'dikbang' => ['value' => 'belum'],
                                    ]
                                ]) }}"
                                style="font-weight:700; color:#111827;">
                                    {{ $rekap['dikbang_belum'] }}
                                </a>
                            </td>

                            <td style="border:1px solid #d1d5db;font-weight:700;">{{ $rekap['smk'] }}</td>
                            <td style="border:1px solid #d1d5db;font-weight:700;">{{ $rekap['d3'] }}</td>
                            <td style="border:1px solid #d1d5db;font-weight:700;">{{ $rekap['s1'] }}</td>
                            <td style="border:1px solid #d1d5db;font-weight:700;">{{ $rekap['s2'] }}</td>

                        </tr>
                    </tbody>

                </table>

            </div>

            <div style="
                margin-top:20px;
                background:#f9fafb;
                padding:15px;
                border-radius:10px;
                border:1px solid #e5e7eb;
                text-align:center;
            ">
                <span style="color:#f59e0b;font-size:14px;">
                    Klik jumlah data untuk melihat detail personel.
                </span>
            </div>

        </div>

    </div>

</x-filament::page>
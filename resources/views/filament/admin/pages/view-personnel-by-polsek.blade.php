<x-filament::page>

    <h2 style="text-align:center; font-weight:bold; margin-bottom:20px;">
        DATA PERSONEL PER POLSEK
    </h2>

    @if($personnels->isEmpty())
        <p style="text-align:center;">Data tidak ditemukan</p>
    @else

    <div style="overflow-x:auto;">
        <table style="width:100%; border-collapse: collapse; font-size:12px;">
            <thead>
                <tr style="background:#f2f2f2;">
                    <th style="border:1px solid #000; padding:6px;">No</th>
                    <th style="border:1px solid #000; padding:6px;">Foto</th>
                    <th style="border:1px solid #000; padding:6px;">Nama</th>
                    <th style="border:1px solid #000; padding:6px;">NRP</th>
                    <th style="border:1px solid #000; padding:6px;">Pangkat</th>
                    <th style="border:1px solid #000; padding:6px;">Jabatan</th>
                    <th style="border:1px solid #000; padding:6px;">Polsek</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($personnels as $personnel)
                    <tr>
                        <td style="border:1px solid #000; padding:6px; text-align:center;">
                            {{ $loop->iteration }}
                        </td>

                        <td style="border:1px solid #000; padding:6px; text-align:center;">
                            <img 
                                src="{{ $personnel->foto 
                                    ? asset('storage/' . $personnel->foto) 
                                    : asset('images/default-user.png') 
                                }}"
                                style="width:50px; height:50px; border-radius:50%; object-fit:cover;"
                            >
                        </td>

                        <td style="border:1px solid #000; padding:6px;">
                            {{ $personnel->nama }}
                        </td>

                        <td style="border:1px solid #000; padding:6px; text-align:center;">
                            {{ $personnel->nrp }}
                        </td>

                        <td style="border:1px solid #000; padding:6px;">
                            {{ $personnel->pangkat?->nama_pangkat }}
                        </td>

                        <td style="border:1px solid #000; padding:6px;">
                            {{ $personnel->jabatan?->nama }}
                        </td>

                        <td style="border:1px solid #000; padding:6px;">
                            {{ $personnel->polsek?->nama_polsek }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @endif

</x-filament::page>
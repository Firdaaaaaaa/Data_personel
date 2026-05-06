<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Personel</title>

    <style>
        body {
            font-family: sans-serif;
            font-size: 9px;
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        th, td {
            border: 1px solid #000;
            padding: 3px;
            word-wrap: break-word;
            text-align: center;
        }

        th {
            background: #eeeeee;
        }

        img {
            width: 40px;
            height: 40px;
            object-fit: cover;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>

{{-- PDF HTML --}}

<h2>DATA PERSONEL</h2>

@foreach ($personnels->chunk(40) as $chunk)
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="10%">Foto</th> <!-- ✅ tambah -->
                <th width="15%">Nama</th>
                <th width="10%">NRP</th>
                <th width="12%">Pangkat</th>
                <th width="15%">Jabatan</th>
                <th width="10%">Dikum</th>
                <th width="10%">Diktuk</th>
                <th width="13%">Dikjur/Dikbang</th>
                <th width="10%">Polsek</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($chunk as $personnel)
            <tr>
                <td>{{ $loop->iteration }}</td>

                <!-- ✅ FOTO -->
                <td>
                    @if ($personnel->foto)
                        <img src="{{ public_path('storage/' . $personnel->foto) }}">
                    @else
                        -
                    @endif
                </td>

                <td>{{ $personnel->nama }}</td>
                <td>{{ $personnel->nrp }}</td>
                <td>{{ $personnel->pangkat?->nama_pangkat }}</td>
                <td>{{ $personnel->jabatan?->nama }}</td>
                <td>{{ $personnel->dikum?->jenjang_pendidikan }}</td>
                <td>{{ $personnel->diktuk?->nama_pendidikan }}</td>
                <td>{{ $personnel->dikjur?->nama_pendidikan }}</td>
                <td>{{ $personnel->polsek?->nama_polsek }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="page-break"></div>
@endforeach

</body>
</html>
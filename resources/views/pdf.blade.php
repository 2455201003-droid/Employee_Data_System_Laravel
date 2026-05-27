<!DOCTYPE html>
<html>
<head>
    <title>Rekap Data Pegawai</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>

<h3 style="text-align:center;">REKAP DATA PEGAWAI</h3>

<table>
    <thead>
        <tr>
            <th>NIP</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Departemen</th>
            <th>Foto</th>
            <th>Tanggal Masuk</th>
        </tr>
    </thead>

    <tbody>
        @foreach($data as $employe)
        <tr>
            <td>{{ $employe->nip }}</td>
            <td>{{ $employe->nama_pegawai }}</td>
            <td>{{ $employe->jabatan }}</td>
            <td>{{ $employe->departement->nama_departemen ?? '-' }}</td>

            <td>
                @if($employe->foto)
                    <img src="{{ public_path('foto_pegawai/' . $employe->foto) }}"
                         width="60">
                @else
                    Tidak ada foto
                @endif
            </td>

            <td>{{ $employe->tanggal_masuk }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
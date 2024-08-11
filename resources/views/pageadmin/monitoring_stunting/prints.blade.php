<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Laporan</title>
    <style>
        /* landscape orientation */
        @page {
            size: A4 landscape;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .kop-surat {
            display: flex;
            align-items: center;
            position: relative;
            padding-bottom: 10px;
        }

        .logo {
            width: 100px;
            top: 0;
            position: absolute;
            /* Adjust the width as needed */
            /* height: auto; */
            margin-right: 20px;
        }

        .kop-teks {
            text-align: center;
            flex: 1;
        }

        .kop-teks h1,
        .kop-teks h2 {
            margin: 0;
        }

        hr {
            border: 1px solid black;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
            margin-top: 10px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            font-size: .8em;
        }

        th {
            background-color: #f2f2f2;
        }

        tfoot {
            background-color: #f2f2f2;
        }

        .image-grid {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly !important;
            justify-items: center;
            /* Untuk mengompensasi margin pada gambar */
        }

        .image-grid img {
            margin-top: 10px;
            height: 150px;
            padding-top: 10px;
            width: 19%;
        }
    </style>
</head>

<body>
    <div class="kop-surat">
        <div class="kop-teks">
            <h3 style="margin: 0px;">
                PUSKESMAS LUBUK JAMBI
            </h3>
            <h4 style="margin: 0px;">Kabupaten Kuatan Singingi, Kecamatan Kuantan Mudik</h4>

        </div>
    </div>
    <hr>

    <h4>Laporan Monitoring Stunting</h4>
    <table id="datatablesSimple">
        <thead>
            <tr>
                <th>Nama Anak</th>
                <th>Tanggal Kunjungan</th>
                <th>Berat Badan (kg)</th>
                <th>Tinggi Badan (cm)</th>
                <th>Lingkar Kepala (cm)</th>
                <th>Status Gizi</th>
                <th>Hasil Pemeriksaan Kesehatan</th>
                <th>Tindakan</th>
                <th>Catatan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stuntingMonit as $kunjungan)
                <tr>
                    <td>{{ $kunjungan->indentifikasiStunting ? $kunjungan->indentifikasiStunting->anak->nama_lengkap : '' }}
                    </td>
                    <td>{{ $kunjungan->tanggal }}</td>
                    <td>{{ $kunjungan->berat_badan }}</td>
                    <td>{{ $kunjungan->tinggi_badan }}</td>
                    <td>{{ $kunjungan->lingkar_kepala }}</td>
                    <td>{{ $kunjungan->status_gizi }}</td>
                    <td>{{ $kunjungan->hasil_pemeriksaan_kesehatan }}</td>
                    <td>{{ $kunjungan->tindakan }}</td>
                    <td>{{ $kunjungan->catatan }}</td>
                    <td>{{ $kunjungan->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="display: flex; justify-content: end; width: 100%">
        <div style="text-align: center; width: 100%">
            <p>Mengetahui,</p>
            <p>Kepala Puskesmas Lubuk Jambi</p>
            <br>
            <br>
            <p>_________________________</p>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>

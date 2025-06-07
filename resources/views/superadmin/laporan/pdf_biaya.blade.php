<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
</head>

<body>

    <table width="100%">
        <tr>
            <td width="15%">
                {{-- <img
                    src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('logo/logo.jpg'))) }}"
                    width="100px"> --}}
            </td>
            <td style="text-align: center;" width="60%">

                <font size="24px"><b>PT. Tanjung Selatan Makmur Jaya <br />
                    </b></font>
                Desa Beringin, Kabupaten Barito Kuala, Kalimantan Selatan 70513
            </td>
            <td width="15%">
            </td>
        </tr>
    </table>
    <hr>
    <h3 style="text-align: center">LAPORAN DATA BIAYA PORDUKSI
    </h3>
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Kode Produksi</th>
            <th>Nama Produksi</th>
            <th>Bahan</th>
            <th>Jenis</th>
            <th>Tenaga Kerja</th>
            <th>Biaya</th>
            <th>Harga Produksi</th>
            <th>Harga Jual</th>
        </tr>
        @php
        $no =1;
        @endphp

        @foreach ($data as $key => $item)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$item->kode}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->bahan == null ? '': $item->bahan->nama}}</td>
            <td>{{$item->jenis == null ? '': $item->jenis->nama}}</td>
            <td>{{$item->tenagakerja == null ? '': $item->tenagakerja->nama}}</td>
            <td>{{number_format($item->biaya)}}</td>
            <td>{{number_format($item->harga_produksi)}}</td>
            <td>{{number_format($item->harga_jual)}}</td>
        </tr>
        @endforeach
    </table>

    <table width="100%">
        <tr>
            <td width="60%"></td>
            <td></td>
            <td><br />{{\Carbon\Carbon::now()->translatedFormat('d F Y')}}<br />
                Mengetahui,<br />Pimpinan<br /><br /><br />

                <u>-</u><br />

            </td>
        </tr>
    </table>
</body>

</html>
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
                <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('logo/logo.jpg'))) }}"
                    width="100px">
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
            <th rowspan="2">No</th>
            <th rowspan="2">Kode Produksi</th>
            <th rowspan="2">Nama Produksi</th>
            <th rowspan="2">Bahan</th>
            <th rowspan="2">Jenis</th>
            <th rowspan="2">Tenaga Kerja</th>
            <th colspan="3" class="text-center">Perhitungan Full Cost</th>
            <th rowspan="2">Aksi</th>
        </tr>
        <tr>
            <th>Biaya Produksi</th>
            <th>HPP</th>
            <th>Laba / Rugi</th>
        </tr>
        @php
        $no =1;
        @endphp

        @foreach ($data as $key => $item)
        <tr style="font-size:14px">
            <td>{{$key + 1}}</td>
            <td>{{$item->kode}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->bahan == null ? '': $item->bahan->nama}}</td>
            <td>{{$item->jenis == null ? '': $item->jenis->nama}}</td>
            <td>{{$item->tenagakerja == null ? '': $item->tenagakerja->nama}}</td>
            <td>
                <table width="100%">
                    <tr>
                        <td>Bahan Baku</td>
                        <td class="text-right">{{number_format($item->bahan->harga)}}</td>
                    </tr>
                    <tr>
                        <td>Tenaga Kerja</td>
                        <td class="text-right">{{number_format($item->tenagakerja->upah->jumlah)}}</td>
                    </tr>
                    <tr>
                        <td>Overhead Variabel</td>
                        <td class="text-right">{{number_format($item->overhead->overhead_variabel)}}
                        </td>
                    </tr>
                    <tr>
                        <td>Overhead Tetap</td>
                        <td class="text-right">{{number_format($item->overhead->overhead_tetap)}}</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td class="text-right">{{number_format($item->totalBiaya())}}</td>
                    </tr>
                </table>

            </td>
            <td>
                <table width="100%">
                    <tr>
                        <td>Persediaan barang awal jadi</td>
                        <td class="text-right">{{number_format($item->barang_awal)}}</td>
                    </tr>
                    <tr>
                        <td>HPP</td>
                        <td class="text-right">{{number_format($item->totalBiaya())}}</td>
                    </tr>
                    <tr>
                        <td>Persediaan barang akhir jadi</td>
                        <td class="text-right">{{number_format($item->barang_akhir)}}
                        </td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td class="text-right">{{number_format($item->HPP())}}</td>
                    </tr>
                </table>
            </td>
            <td>
                <table width="100%">
                    <tr>
                        <td>Total Penjualan </td>
                        <td class="text-right">{{number_format($item->penjualan)}}</td>
                    </tr>
                    <tr>
                        <td>HPP</td>
                        <td class="text-right">{{number_format($item->HPP())}}</td>
                    </tr>
                    <tr>
                        <td>Hasil</td>
                        <td class="text-right">{{number_format($item->penjualan - $item->HPP())}}
                        </td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td class="text-right">
                            @if (number_format($item->penjualan - $item->HPP() > 0))
                            Laba
                            @else
                            Rugi
                            @endif
                        </td>
                    </tr>
                </table>
            </td>
            <td class="text-right">
                <a href="/superadmin/biaya/edit/{{$item->id}}" class="btn btn-sm btn-success"><i
                        class="fa fa-edit"></i></a>
                <a href="/superadmin/biaya/delete/{{$item->id}}" class="btn btn-sm btn-danger"
                    onclick="return confirm('Yakin ingin dihapus?');"><i class="fa fa-trash"></i></a>
            </td>
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

<script>
    window.print();
</script>

</html>
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data biaya produksi (Perhitungan Full Costing)</h3>

                <div class="card-tools">
                    <a href="/superadmin/biaya/add" class='btn btn-sm btn-success'>Tambah Data</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap table-sm table-bordered">
                    <thead class="bg-success">
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
                    </thead>
                    <tbody>
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

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div> {{$data->links()}}
    </div>
</div>

@endsection
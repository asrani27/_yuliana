@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data biaya produksi</h3>

                <div class="card-tools">
                    <a href="/superadmin/biaya/add" class='btn btn-sm btn-success'>Tambah Data</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap table-sm table-bordered">
                    <thead class="bg-success">
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
                            <th>Aksi</th>
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
                            <td>{{number_format($item->biaya)}}</td>
                            <td>{{number_format($item->harga_produksi)}}</td>
                            <td>{{number_format($item->harga_jual)}}</td>
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
        </div>
    </div>
</div>

@endsection
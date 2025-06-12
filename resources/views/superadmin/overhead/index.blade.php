@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data overhead</h3>

                <div class="card-tools">
                    <a href="/superadmin/overhead/add" class='btn btn-sm btn-success'>Tambah Data</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap table-sm table-bordered">
                    <thead class="bg-success">
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama overhead</th>
                            <th>Jenis Overhead</th>
                            <th>Biaya Overhead Variable</th>
                            <th>Biaya Overhead Tetap</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr style="font-size:14px">
                            <td>{{$key + 1}}</td>
                            <td>{{$item->kode}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->jenis}}</td>
                            <td>{{number_format($item->overhead_variabel)}}</td>
                            <td>{{number_format($item->overhead_tetap)}}</td>
                            <td>{{$item->keterangan}}</td>
                            <td class="text-right">

                                <a href="/superadmin/overhead/edit/{{$item->id}}" class="btn btn-sm btn-success"><i
                                        class="fa fa-edit"></i></a>
                                <a href="/superadmin/overhead/delete/{{$item->id}}" class="btn btn-sm btn-danger"
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
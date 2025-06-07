@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Mutasi</h3>

                <div class="card-tools">
                    <a href="/superadmin/mutasi/add" class='btn btn-sm btn-info'>Tambah Data</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap table-sm table-bordered">
                    <thead class="bg-info">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nomor Mutasi</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jenis</th>
                            <th>Satuan</th>
                            <th>Dari Ruangan</th>
                            <th>Ke Ruangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr style="font-size:14px">
                            <td>{{$key + 1}}</td>
                            <td>{{\Carbon\Carbon::parse($item->tanggal)->format('d M Y')}}</td>
                            <td>{{$item->nomor}}</td>
                            <td>{{$item->inventaris == null ? '': $item->inventaris->barang->kode}}</td>
                            <td>{{$item->inventaris == null ? '': $item->inventaris->barang->nama}}</td>
                            <td>{{$item->inventaris == null ? '': $item->inventaris->barang->jenis}}</td>
                            <td>{{$item->inventaris == null ? '': $item->inventaris->barang->satuan}}</td>
                            <td>{{$item->dari == null ? '': $item->dari->nama}}</td>
                            <td>{{$item->ke == null ? '': $item->ke->nama}}</td>
                            <td class="text-right">

                                <a href="/superadmin/mutasi/edit/{{$item->id}}" class="btn btn-sm btn-success"><i
                                        class="fa fa-edit"></i></a>
                                <a href="/superadmin/mutasi/delete/{{$item->id}}" class="btn btn-sm btn-danger"
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
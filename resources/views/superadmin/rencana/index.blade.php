@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Rencana Kegiatan</h3>

                <div class="card-tools">
                    <a href="/superadmin/rencana/add" class='btn btn-sm btn-success'>Tambah Data</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap table-sm table-bordered">
                    <thead class="bg-success">
                        <tr>
                            <th>No</th>
                            <th>Tgl Kegiatan</th>
                            <th>Nama Kegiatan</th>
                            <th>Tingkat</th>
                            <th>Siswa</th>
                            <th>Organisasi</th>
                            <th>Penyelenggara</th>
                            <th>Biaya</th>
                            <th>Target</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr style="font-size:14px">
                            <td>{{$key + 1}}</td>
                            <td>{{\Carbon\Carbon::parse($item->tanggal)->format('d M Y')}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->tingkat}}</td>
                            <td>{{$item->siswa == null ? '' : $item->siswa->nama}}</td>
                            <td>{{$item->organisasi == null ? '' : $item->organisasi->nama}}</td>
                            <td>{{$item->penyelenggara}}</td>
                            <td>{{$item->biaya}}</td>
                            <td>{{$item->target}}</td>
                            <td>{{$item->keterangan}}</td>
                            <td class="text-right">

                                <a href="/superadmin/rencana/edit/{{$item->id}}" class="btn btn-sm btn-success"><i
                                        class="fa fa-edit"></i></a>
                                <a href="/superadmin/rencana/delete/{{$item->id}}" class="btn btn-sm btn-danger"
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
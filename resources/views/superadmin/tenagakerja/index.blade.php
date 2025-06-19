@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data tenagakerja</h3>

                <div class="card-tools">
                    <a href="/superadmin/tenagakerja/add" class='btn btn-sm btn-success'>Tambah Data</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap table-sm table-bordered">
                    <thead class="bg-success">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Agama</th>
                            <th>Pendidikan</th>
                            <th>Keahlian</th>
                            <th>Telp</th>
                            <th>Alamat</th>
                            <th>Upah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr style="font-size:14px">
                            <td>{{$key + 1}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->tempat_lahir}}</td>
                            <td>{{\Carbon\Carbon::parse($item->tanggal_lahir)->format('d M Y')}}</td>
                            <td>{{$item->agama}}</td>
                            <td>{{$item->pendidikan}}</td>
                            <td>{{$item->keahlian}}</td>
                            <td>{{$item->telp}}</td>
                            <td>{{$item->alamat}}</td>
                            <td>{{$item->upah == null ? 0 : number_format($item->upah->jumlah)}}</td>
                            <td class="text-right">
                                <a href="/superadmin/tenagakerja/edit/{{$item->id}}" class="btn btn-sm btn-success"><i
                                        class="fa fa-edit"></i></a>
                                <a href="/superadmin/tenagakerja/delete/{{$item->id}}" class="btn btn-sm btn-danger"
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
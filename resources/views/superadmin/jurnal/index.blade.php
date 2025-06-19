@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data jurnal umum</h3>

                <div class="card-tools">
                    <a href="/superadmin/jurnal/add" class='btn btn-sm btn-success'>Tambah Data</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap table-sm table-bordered">
                    <thead class="bg-success">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Nominal</th>
                            <th>Debit</th>
                            <th>Kredit</th>
                            <th>Kode Biaya</th>
                            <th>Overhead</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr style="font-size:14px">
                            <td>{{$key + 1}}</td>
                            <td>{{\Carbon\Carbon::parse($item->tanggal)->format('d M Y')}}</td>
                            <td>{{$item->kode}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{number_format($item->nominal)}}</td>
                            <td>{{$item->debit}}</td>
                            <td>{{$item->kredit}}</td>
                            <td>{{$item->biaya == null ? '': $item->biaya->kode}}</td>
                            <td>{{$item->overhead == null ? '': $item->overhead->nama}}</td>
                            <td class="text-right">
                                <a href="/superadmin/jurnal/edit/{{$item->id}}" class="btn btn-sm btn-success"><i
                                        class="fa fa-edit"></i></a>
                                <a href="/superadmin/jurnal/delete/{{$item->id}}" class="btn btn-sm btn-danger"
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
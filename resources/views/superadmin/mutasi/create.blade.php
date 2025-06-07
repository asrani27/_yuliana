@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Data</h3>

            </div>
            <form method="POST" action="/superadmin/mutasi/add">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Mutasi</label>
                        <input type="date" name="tanggal" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor mutasi</label>
                        <input type="text" name="nomor" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Data Barang</label>
                        <select class="form-control" name="inventaris_id">
                            @foreach (inventaris() as $item)
                            <option value="{{$item->id}}">{{$item->barang->kode}} - {{$item->barang->nama}},
                                {{$item->ruangan->nama}}
                            </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Mutasi Ke </label>
                        <select class="form-control" name="ruangan_id">
                            @foreach (ruangan() as $item)
                            <option value="{{$item->id}}">
                                {{$item->nama}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/superadmin/mutasi" class="btn btn-danger">Kembali</a>
                </div>
            </form>
            <!-- /.card-body -->
        </div>
    </div>
</div>

@endsection
@push('js')

@endpush
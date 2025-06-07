@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Data</h3>

            </div>
            <form method="POST" action="/superadmin/prestasi/add">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Kegiatan</label>
                        <select class="form-control" name="rencana_id">
                            @foreach ($rencana as $item)
                            <option value="{{$item->id}}">{{$item->nama}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">prestasi</label>
                        <input type="text" name="prestasi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">keterangan</label>
                        <input type="text" name="keterangan" class="form-control" required>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/superadmin/prestasi" class="btn btn-danger">Kembali</a>
                </div>
            </form>
            <!-- /.card-body -->
        </div>
    </div>
</div>

@endsection
@push('js')

@endpush
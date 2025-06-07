@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Data</h3>

            </div>
            <form method="POST" action="/superadmin/tenagakerja/add">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">tanggal lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Agama</label>
                        <select class="form-control" name="agama">
                            <option value="ISLAM">ISLAM</option>
                            <option value="KRISTEN">KRISTEN</option>
                            <option value="KATOLIK">KATOLIK</option>
                            <option value="HINDU">HINDU</option>
                            <option value="BUDDHA">BUDDHA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pendidikan</label>
                        <input type="text" name="pendidikan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Keahlian</label>
                        <input type="text" name="keahlian" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Telp</label>
                        <input type="text" name="telp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <input type="text" name="alamat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">upah</label>
                        <select class="form-control" name="upah_id">
                            <option value="">-</option>
                            @foreach ($upah as $item)
                            <option value="{{$item->id}}">{{number_format($item->jumlah)}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/superadmin/tenagakerja" class="btn btn-danger">Kembali</a>
                </div>
            </form>
            <!-- /.card-body -->
        </div>
    </div>
</div>

@endsection
@push('js')

@endpush
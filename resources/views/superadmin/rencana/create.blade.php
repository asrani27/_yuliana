@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Data</h3>

            </div>
            <form method="POST" action="/superadmin/rencana/add">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Kegiatan</label>
                        <input type="date" name="tanggal" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kegiatan</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tingkat</label>
                        <input type="text" name="tingkat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Siswa</label>
                        <select class="form-control" name="siswa_id">

                            @foreach ($siswa as $item)
                            <option value="{{$item->id}}">{{$item->nis}} - {{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Organisasi</label>
                        <select class="form-control" name="organisasi_id">

                            @foreach ($organisasi as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Penyelenggara</label>
                        <input type="text" name="penyelenggara" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">biaya</label>
                        <input type="text" name="biaya" class="form-control" onkeypress="return hanyaAngka(event)"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">target</label>
                        <input type="text" name="target" class="form-control" required>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/superadmin/rencana" class="btn btn-danger">Kembali</a>
                </div>
            </form>
            <!-- /.card-body -->
        </div>
    </div>
</div>

@endsection
@push('js')
<script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
      return true;
    }
</script>
@endpush
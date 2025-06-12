@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Data</h3>

            </div>
            <form method="POST" action="/superadmin/overhead/edit/{{$data->id}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama overhead</label>
                        <input type="text" name="nama" class="form-control" value="{{$data->nama}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">jenis overhead</label>
                        <input type="text" name="jenis" class="form-control" value="{{$data->jenis}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Biaya Overhead Pabrik variabel</label>
                        <input type="text" name="overhead_variabel" class="form-control"
                            value="{{$data->overhead_variabel}}" onkeypress="return hanyaAngka(event)" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Biaya Overhead Pabrik tetap</label>
                        <input type="text" name="overhead_tetap" class="form-control" value="{{$data->overhead_tetap}}"
                            onkeypress="return hanyaAngka(event)" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">keterangan</label>
                        <input type="text" name="keterangan" class="form-control" value="{{$data->keterangan}}"
                            required>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/superadmin/overhead" class="btn btn-danger">Kembali</a>
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
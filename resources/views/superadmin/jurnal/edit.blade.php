@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Data</h3>

            </div>
            <form method="POST" action="/superadmin/jurnal/edit/{{$data->id}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal</label>
                        <input type="date" name="tanggal" value="{{$data->tanggal}}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Jurnal</label>
                        <input type="text" name="kode" value={{$data->kode}} class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama jurnal</label>
                        <input type="text" name="nama" value="{{$data->nama}}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">nominal</label>
                        <input type="text" name="nominal" value="{{$data->nominal}}" class="form-control"
                            onkeypress="return hanyaAngka(event)" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">kelompok</label>
                        <input type="text" name="kelompok" value="{{$data->kelompok}}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">debit</label>
                        <input type="text" name="debit" value="{{$data->debit}}" class="form-control"
                            onkeypress="return hanyaAngka(event)" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">kredit</label>
                        <input type="text" name="kredit" value="{{$data->kredit}}" class="form-control"
                            onkeypress="return hanyaAngka(event)" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">keterangan</label>
                        <input type="text" name="keterangan" value="{{$data->keterangan}}" class="form-control"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Biaya</label>
                        <select class="form-control" name="biaya_id">
                            <option value="">-</option>
                            @foreach (biaya() as $item)
                            <option value="{{$item->id}}" {{$data->biaya_id == $item->id ?
                                'selected':''}}>{{$item->kode}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Overhead</label>
                        <select class="form-control" name="overhead_id">
                            <option value="">-</option>
                            @foreach (overhead() as $item)
                            <option value="{{$item->id}}" {{$data->overhead_id == $item->id ?
                                'selected':''}}>{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/superadmin/jurnal" class="btn btn-danger">Kembali</a>
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
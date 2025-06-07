@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Data</h3>

            </div>
            <form method="POST" action="/superadmin/biaya/add">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Produksi</label>
                        <input type="text" name="kode" value={{kodeBiaya()}} class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Produksi</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">bahan</label>
                        <select class="form-control" name="bahan_id">
                            <option value="">-</option>
                            @foreach (bahan() as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">jenis</label>
                        <select class="form-control" name="jenis_id">
                            <option value="">-</option>
                            @foreach (jenis() as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">tenagakerja</label>
                        <select class="form-control" name="tenaga_kerja_id">
                            <option value="">-</option>
                            @foreach (tenagakerja() as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Biaya</label>
                        <input type="text" name="biaya" class="form-control" onkeypress="return hanyaAngka(event)"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">harga produksi</label>
                        <input type="text" name="harga_produksi" class="form-control"
                            onkeypress="return hanyaAngka(event)" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">harga jual</label>
                        <input type="text" name="harga_jual" class="form-control" onkeypress="return hanyaAngka(event)"
                            required>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/superadmin/biaya" class="btn btn-danger">Kembali</a>
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
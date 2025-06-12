@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Data</h3>

            </div>
            <form method="POST" action="/superadmin/jurnal/add">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal</label>
                        <input type="date" name="tanggal" value="{{\Carbon\CArbon::now()->format('Y-m-d')}}"
                            class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Jurnal</label>
                        <input type="text" name="kode" value={{kodeJurnal()}} class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama jurnal</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">nominal</label>
                        <input type="text" name="nominal" class="form-control" onkeypress="return hanyaAngka(event)"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">kelompok</label>
                        <input type="text" name="kelompok" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">debit</label>

                        <select class="form-control" name="debit">
                            <option value="bertambah">Bertambah</option>
                            <option value="berkurang">Berkurang</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">kredit</label>
                        <select class="form-control" name="kredit">
                            <option value="bertambah">Bertambah</option>
                            <option value="berkurang">Berkurang</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">keterangan</label>
                        <input type="text" name="keterangan" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Biaya</label>
                        <select class="form-control" name="biaya_id">
                            <option value="">-</option>
                            @foreach (biaya() as $item)
                            <option value="{{$item->id}}">{{$item->kode}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Overhead</label>
                        <select class="form-control" name="overhead_id">
                            <option value="">-</option>
                            @foreach (overhead() as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
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
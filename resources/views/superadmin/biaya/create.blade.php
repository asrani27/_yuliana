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
                        <input type="text" name="kode" value={{kodeBiaya()}} class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Produksi</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Biaya Bahan Baku</label>
                        <select class="form-control" name="bahan_id">
                            <option value="">-</option>
                            @foreach (bahan() as $item)
                            <option value="{{$item->id}}">Kode {{$item->kode}}, Rp. {{number_format($item->harga)}}
                            </option>
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
                        <label for="exampleInputEmail1">Biaya Tenaga Kerja</label>
                        <select class="form-control" name="tenaga_kerja_id">
                            <option value="">-</option>
                            @foreach (tenagakerja() as $item)
                            <option value="{{$item->id}}">{{$item->nama}} - Rp. {{number_format($item->upah->jumlah)}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Biaya Overhead Pabrik</label>
                        <select class="form-control" name="overhead_id">
                            <option value="">-</option>
                            @foreach (overhead() as $item)
                            <option value="{{$item->id}}">Variabel : Rp.{{number_format($item->overhead_variabel)}} -
                                Tetap : Rp. {{number_format($item->overhead_tetap)}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Persedian barang awal jadi</label>
                        <input type="text" name="barang_awal" class="form-control" onkeypress="return hanyaAngka(event)"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Persedian barang akhir jadi</label>
                        <input type="text" name="barang_akhir" class="form-control"
                            onkeypress="return hanyaAngka(event)" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Penjualan Bersih</label>
                        <input type="text" name="penjualan" class="form-control" onkeypress="return hanyaAngka(event)"
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
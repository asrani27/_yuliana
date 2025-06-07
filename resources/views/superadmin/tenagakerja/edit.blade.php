@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Data</h3>

            </div>
            <form method="POST" action="/superadmin/tenagakerja/edit/{{$data->id}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama tenaga kerja</label>
                        <input type="text" name="nama" value="{{$data->nama}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="{{$data->tempat_lahir}}" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">tanggal lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{$data->tanggal_lahir}}" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Agama</label>
                        <select class="form-control" name="agama">
                            <option value="ISLAM" {{$data->jkel == 'ISLAM' ? 'selected':''}}>ISLAM</option>
                            <option value="KRISTEN" {{$data->jkel == 'KRISTEN' ? 'selected':''}}>KRISTEN</option>
                            <option value="KATOLIK" {{$data->jkel == 'KATOLIK' ? 'selected':''}}>KATOLIK</option>
                            <option value="HINDU" {{$data->jkel == 'HINDU' ? 'selected':''}}>HINDU</option>
                            <option value="BUDDHA" {{$data->jkel == 'BUDDHA' ? 'selected':''}}>BUDDHA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">pendidikan</label>
                        <input type="text" name="pendidikan" value="{{$data->pendidikan}}" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">keahlian</label>
                        <input type="text" name="keahlian" value="{{$data->keahlian}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Telp</label>
                        <input type="text" name="telp" value="{{$data->telp}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <input type="text" name="alamat" value="{{$data->alamat}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">upah</label>
                        <select class="form-control" name="upah_id">
                            <option value="">-</option>
                            @foreach ($upah as $item)
                            <option value="{{$item->id}}" {{$data->upah_id == $item->id ?
                                'selected':''}}>{{number_format($item->jumlah)}}</option>
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
<script>
    $(document).ready(function () {
    const triwulanOptions = {
    "1": ["1", "2"],
    "2": ["3", "4"]
    };

    const bulanOptions = {
    "1": ["Januari", "Februari", "Maret"],
    "2": ["April", "Mei", "Juni"],
    "3": ["Juli", "Agustus", "September"],
    "4": ["Oktober", "November", "Desember"]
    };

    $("#semester").change(function () {
    let semesterVal = $(this).val();
    $("#triwulan").html('<option value="">-triwulan-</option>');
    $("#bulan").html('<option value="">-bulan-</option>');

    if (semesterVal) {
    triwulanOptions[semesterVal].forEach(function (triwulan) {
    $("#triwulan").append('<option value="' + triwulan + '">' + triwulan + '</option>');
    });
    }
    });

    $("#triwulan").change(function () {
    let triwulanVal = $(this).val();
    $("#bulan").html('<option value="">-bulan-</option>');

    if (triwulanVal) {
    bulanOptions[triwulanVal].forEach(function (bulan) {
    $("#bulan").append('<option value="' + bulan + '">' + bulan + '</option>');
    });
    }
    });
    });
</script>
@endpush
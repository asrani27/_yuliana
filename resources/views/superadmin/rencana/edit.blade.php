@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Data</h3>

            </div>
            <form method="POST" action="/superadmin/rencana/edit/{{$data->id}}">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Kegiatan</label>
                        <input type="date" name="tanggal" value="{{$data->tanggal}}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kegiatan</label>
                        <input type="text" name="nama" class="form-control" value="{{$data->nama}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tingkat</label>
                        <input type="text" name="tingkat" class="form-control" value="{{$data->tingkat}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Siswa</label>
                        <select class="form-control" name="siswa_id">

                            @foreach ($siswa as $item)
                            <option value="{{$item->id}}" {{$data->siswa_id = $item->id ? 'selected':''}}>{{$item->nis}}
                                - {{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Organisasi</label>
                        <select class="form-control" name="organisasi_id">

                            @foreach ($organisasi as $item)
                            <option value="{{$item->id}}" {{$data->organisasi_id = $item->id ?
                                'selected':''}}>{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Penyelenggara</label>
                        <input type="text" name="penyelenggara" class="form-control" value="{{$data->penyelenggara}}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">biaya</label>
                        <input type="text" name="biaya" class="form-control" value="{{$data->biaya}}"
                            onkeypress="return hanyaAngka(event)" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">target</label>
                        <input type="text" name="target" class="form-control" value="{{$data->target}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" value="{{$data->keterangan}}"
                            required>
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
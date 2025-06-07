@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Profil Data Sekolah</h3>

            </div>
            <form method="POST" action="/superadmin/profil">
                @csrf
                <div class="card-body">


                    <div class="form-group">
                        <label for="exampleInputEmail1">NIS Sekolah</label>
                        <input type="text" name="nis" value="{{$data->nis}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Sekolah</label>
                        <input type="text" name="nama" value="{{$data->nama}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
                        <input type="text" name="status" value="{{$data->status}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">alamat</label>
                        <input type="text" name="alamat" value="{{$data->alamat}}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">telp</label>
                        <input type="text" name="telp" value="{{$data->telp}}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">email</label>
                        <input type="text" name="email" value="{{$data->email}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Website</label>
                        <input type="text" name="website" value="{{$data->website}}" class="form-control" required>
                    </div>



                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
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
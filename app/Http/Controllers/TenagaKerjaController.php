<?php

namespace App\Http\Controllers;

use App\Models\TenagaKerja;
use App\Models\Upah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TenagaKerjaController extends Controller
{

    public function index()
    {
        $data = TenagaKerja::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.tenagakerja.index', compact('data'));
    }
    public function add()
    {
        $upah = Upah::get();
        return view('superadmin.tenagakerja.create', compact('upah'));
    }
    public function store(Request $req)
    {
        $param = $req->all();
        TenagaKerja::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/tenagakerja');
    }
    public function edit($id)
    {
        $data = TenagaKerja::find($id);
        $upah = Upah::get();
        return view('superadmin.tenagakerja.edit', compact('data', 'upah'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        TenagaKerja::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/tenagakerja');
    }
    public function delete($id)
    {
        TenagaKerja::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/tenagakerja');
    }
}

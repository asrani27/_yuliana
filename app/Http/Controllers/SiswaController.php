<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    public function index()
    {
        $data = Siswa::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.siswa.index', compact('data'));
    }
    public function add()
    {
        $kelas = Kelas::get();
        return view('superadmin.siswa.create', compact('kelas'));
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Siswa::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/siswa');
    }
    public function edit($id)
    {
        $data = Siswa::find($id);
        $kelas = Kelas::get();
        return view('superadmin.siswa.edit', compact('data', 'kelas'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Siswa::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/siswa');
    }
    public function delete($id)
    {
        Siswa::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/siswa');
    }
}

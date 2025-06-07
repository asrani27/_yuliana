<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Rencana;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RencanaController extends Controller
{
    public function index()
    {
        $data = Rencana::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.rencana.index', compact('data'));
    }
    public function add()
    {
        $siswa = Siswa::get();
        $organisasi = Organisasi::get();
        return view('superadmin.rencana.create', compact('siswa', 'organisasi'));
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Rencana::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/rencana');
    }
    public function edit($id)
    {
        $data = Rencana::find($id);

        $siswa = Siswa::get();
        $organisasi = Organisasi::get();
        return view('superadmin.rencana.edit', compact('data', 'siswa', 'organisasi'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Rencana::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/rencana');
    }
    public function delete($id)
    {
        Rencana::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/rencana');
    }
}

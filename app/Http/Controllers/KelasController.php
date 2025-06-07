<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KelasController extends Controller
{
    public function index()
    {
        $data = Kelas::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.kelas.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.kelas.create');
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Kelas::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/kelas');
    }
    public function edit($id)
    {
        $data = Kelas::find($id);
        return view('superadmin.kelas.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Kelas::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/kelas');
    }
    public function delete($id)
    {
        Kelas::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/kelas');
    }
}

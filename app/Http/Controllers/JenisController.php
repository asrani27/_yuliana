<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JenisController extends Controller
{

    public function index()
    {
        $data = Jenis::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.jenis.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.jenis.create');
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Jenis::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/jenis');
    }
    public function edit($id)
    {
        $data = Jenis::find($id);
        return view('superadmin.jenis.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Jenis::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/jenis');
    }
    public function delete($id)
    {
        Jenis::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/jenis');
    }
}

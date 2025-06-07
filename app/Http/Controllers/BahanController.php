<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BahanController extends Controller
{

    public function index()
    {
        $data = Bahan::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.bahan.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.bahan.create');
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Bahan::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/bahan');
    }
    public function edit($id)
    {
        $data = bahan::find($id);
        return view('superadmin.bahan.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Bahan::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/bahan');
    }
    public function delete($id)
    {
        Bahan::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/bahan');
    }
}

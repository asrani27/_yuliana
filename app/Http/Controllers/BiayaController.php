<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BiayaController extends Controller
{

    public function index()
    {
        $data = Biaya::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.biaya.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.biaya.create');
    }
    public function store(Request $req)
    {
        $checkKode = Biaya::where('kode', $req->kode)->first();
        if ($checkKode == null) {
            $param = $req->all();
            Biaya::create($param);
            Session::flash('success', 'Berhasil Disimpan');
            return redirect('/superadmin/biaya');
        } else {
            Session::flash('error', 'Kode sudah ada, gunakan kode lain');
            return back();
        }
    }
    public function edit($id)
    {
        $data = biaya::find($id);
        return view('superadmin.biaya.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Biaya::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/biaya');
    }
    public function delete($id)
    {
        biaya::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/biaya');
    }
}

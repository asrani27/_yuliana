<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JurnalController extends Controller
{

    public function index()
    {
        $data = Jurnal::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.jurnal.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.jurnal.create');
    }
    public function store(Request $req)
    {
        $checkKode = Jurnal::where('kode', $req->kode)->first();
        if ($checkKode == null) {
            $param = $req->all();
            Jurnal::create($param);
            Session::flash('success', 'Berhasil Disimpan');
            return redirect('/superadmin/jurnal');
        } else {
            Session::flash('error', 'Kode sudah ada, gunakan kode lain');
            return back();
        }
    }
    public function edit($id)
    {
        $data = Jurnal::find($id);
        return view('superadmin.jurnal.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Jurnal::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/jurnal');
    }
    public function delete($id)
    {
        Jurnal::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/jurnal');
    }
}

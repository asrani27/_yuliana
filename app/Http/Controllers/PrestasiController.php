<?php

namespace App\Http\Controllers;

use App\Models\Rencana;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PrestasiController extends Controller
{
    public function index()
    {
        $data = Prestasi::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.prestasi.index', compact('data'));
    }
    public function add()
    {
        $rencana = Rencana::get();
        return view('superadmin.prestasi.create', compact('rencana'));
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Prestasi::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/prestasi');
    }
    public function edit($id)
    {
        $data = Prestasi::find($id);
        $rencana = Rencana::get();
        return view('superadmin.prestasi.edit', compact('data', 'rencana'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Prestasi::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/prestasi');
    }
    public function delete($id)
    {
        Prestasi::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/prestasi');
    }
}

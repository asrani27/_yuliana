<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrganisasiController extends Controller
{
    public function index()
    {
        $data = Organisasi::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.organisasi.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.organisasi.create');
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Organisasi::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/organisasi');
    }
    public function edit($id)
    {
        $data = Organisasi::find($id);
        return view('superadmin.organisasi.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Organisasi::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/organisasi');
    }
    public function delete($id)
    {
        Organisasi::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/organisasi');
    }
}

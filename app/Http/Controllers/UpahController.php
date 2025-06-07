<?php

namespace App\Http\Controllers;

use App\Models\Upah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UpahController extends Controller
{

    public function index()
    {
        $data = Upah::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.upah.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.upah.create');
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Upah::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/upah');
    }
    public function edit($id)
    {
        $data = Upah::find($id);
        return view('superadmin.upah.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Upah::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/upah');
    }
    public function delete($id)
    {
        Upah::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/upah');
    }
}

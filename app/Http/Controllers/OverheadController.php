<?php

namespace App\Http\Controllers;

use App\Models\Overhead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OverheadController extends Controller
{

    public function index()
    {
        $data = Overhead::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.overhead.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.overhead.create');
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Overhead::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/overhead');
    }
    public function edit($id)
    {
        $data = Overhead::find($id);
        return view('superadmin.overhead.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Overhead::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/overhead');
    }
    public function delete($id)
    {
        Overhead::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/overhead');
    }
}

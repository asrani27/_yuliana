<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengaduan;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('superadmin.user.index', compact('data'));
    }

    public function add()
    {
        return view('superadmin.user.create');
    }

    public function store(Request $req)
    {
        $check = User::where('username', $req->username)->first();
        if ($check != null) {
            Session::flash('error', 'Username sudah digunakan, silahkan gunakan username lain');
            return back();
        } else {
            $s = new User;
            $s->name = $req->name;
            $s->username = $req->username;
            $s->password = Hash::make($req->password);
            $s->roles = 'superadmin';
            $s->save();
            Session::flash('success', 'Berhasil Simpan');
            return redirect('/superadmin/user');
        }
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('superadmin.user.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        if ($req->password == null) {
            $s = User::find($id);
            $s->name = $req->name;
            $s->username = $req->username;
            $s->save();
            Session::flash('success', 'Berhasil di update');
        } else {
            $s = User::find($id);
            $s->name = $req->name;
            $s->username = $req->username;
            $s->password = Hash::make($req->password);
            $s->save();
            Session::flash('success', 'Berhasil diupdate');
        }
        return redirect('/superadmin/user');
    }

    public function delete($id)
    {
        $delete = User::find($id)->delete();
        Session::flash('success', 'Berhasil dihapus');
        return redirect('/superadmin/user');
    }
}

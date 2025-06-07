<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfilController extends Controller
{
    public function index()
    {
        $data = Profil::first();
        return view('superadmin.profil.index', compact('data'));
    }

    public function update(Request $req)
    {
        Profil::first()->update($req->all());
        Session::flash('success', 'Berhasil Diupdate');
        return back();
    }
}

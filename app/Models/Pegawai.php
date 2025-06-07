<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{

    protected $table = 'pegawai';
    protected $guarded = ['id'];
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }
}

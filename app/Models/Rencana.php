<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rencana extends Model
{
    protected $table = 'rencana';
    protected $guarded = ['id'];
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class, 'organisasi_id');
    }
}

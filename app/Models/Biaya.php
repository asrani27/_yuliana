<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biaya extends Model
{
    protected $table = 'biaya';
    protected $guarded = ['id'];
    public function bahan()
    {
        return $this->belongsTo(Bahan::class);
    }
    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }
    public function tenagakerja()
    {
        return $this->belongsTo(TenagaKerja::class, 'tenaga_kerja_id');
    }
}

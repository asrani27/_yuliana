<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TenagaKerja extends Model
{
    protected $table = 'tenaga_kerja';
    protected $guarded = ['id'];
    public function upah()
    {
        return $this->belongsTo(Upah::class, 'upah_id');
    }
}

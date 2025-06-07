<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table = 'prestasi';
    protected $guarded = ['id'];
    public function rencana()
    {
        return $this->belongsTo(Rencana::class, 'rencana_id');
    }
}

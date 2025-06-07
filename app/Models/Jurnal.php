<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    protected $table = 'jurnal';
    protected $guarded = ['id'];
    public function biaya()
    {
        return $this->belongsTo(Biaya::class);
    }
    public function overhead()
    {
        return $this->belongsTo(Overhead::class);
    }
}

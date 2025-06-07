<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangan';
    protected $guarded = ['id'];

    public function inventaris()
    {
        return $this->hasMany(Inventaris::class, 'ruangan_id');
    }
}

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
    public function overhead()
    {
        return $this->belongsTo(Overhead::class, 'overhead_id');
    }

    public function totalBiaya()
    {
        return $this->overhead->overhead_variabel + $this->overhead->overhead_tetap + $this->tenagakerja->upah->jumlah + $this->bahan->harga;
    }
    public function HPP()
    {
        return $this->barang_awal + $this->totalBiaya() - $this->barang_akhir;
    }
}

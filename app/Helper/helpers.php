<?php

use Carbon\Carbon;
use App\Models\Skpd;
use App\Models\Bahan;
use App\Models\Biaya;
use App\Models\Jenis;
use App\Models\Barang;
use App\Models\Dokumen;
use App\Models\Pegawai;
use App\Models\Ruangan;
use App\Models\Inventaris;
use App\Models\Jurnal;
use App\Models\Overhead;
use App\Models\Verifikasi;
use App\Models\TenagaKerja;

function angkaKeBulan($angka)
{
    $bulan = [
        "01" => "Januari",
        "02" => "Februari",
        "03" => "Maret",
        "04" => "April",
        "05" => "Mei",
        "06" => "Juni",
        "07" => "Juli",
        "08" => "Agustus",
        "09" => "September",
        "10" => "Oktober",
        "11" => "November",
        "12" => "Desember"
    ];

    $angka = str_pad($angka, 2, "0", STR_PAD_LEFT);
    return $bulan[$angka] ?? "Bulan tidak valid";
}

function bulan()
{
    Carbon::setLocale('id');
    // Array untuk menyimpan nama bulan
    $namaBulan = [];

    // Loop untuk mendapatkan nama semua bulan
    for ($i = 1; $i <= 12; $i++) {
        $namaBulan[] = Carbon::createFromDate(2024, $i, 1)->translatedFormat('F');
    }

    return $namaBulan;
}
function ruangan()
{
    return Ruangan::get();
}
function biaya()
{
    return Biaya::get();
}
function overhead()
{
    return Overhead::get();
}
function bahan()
{
    return Bahan::get();
}
function jenis()
{
    return Jenis::get();
}
function tenagakerja()
{
    return TenagaKerja::get();
}

function kodeJurnal()
{
    $kode =  Jurnal::get()->count();
    if ($kode == 0) {
        return 'JU01';
    } else {
        return 'JU0' . Jurnal::get()->count();
    }
}
function kodeBahan()
{
    $kode =  Bahan::get()->count();
    if ($kode == 0) {
        return 'BH01';
    } else {
        return 'BH0' . Bahan::get()->count();
    }
}
function kodeOverhead()
{
    $kode =  Overhead::get()->count();
    if ($kode == 0) {
        return 'OV01';
    } else {
        return 'OV0' . Overhead::get()->count();
    }
}
function kodeBiaya()
{
    $kode =  Biaya::get()->count();
    if ($kode == 0) {
        return 'BY01';
    } else {
        return 'BY0' . Biaya::get()->count();
    }
}

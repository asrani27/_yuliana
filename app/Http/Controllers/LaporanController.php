<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\Klien;
use App\Models\Barang;
use App\Models\Biaya;
use App\Models\Mutasi;
use App\Models\Profil;
use App\Models\Dokumen;
use App\Models\Pegawai;
use App\Models\Ruangan;
use App\Models\Evaluasi;
use App\Models\Penerima;
use App\Models\Pengaduan;
use App\Models\Distribusi;
use App\Models\Inventaris;
use App\Models\Jenis;
use App\Models\Jurnal;
use App\Models\Verifikasi;
use App\Models\Pemeliharaan;
use App\Models\Prestasi;
use App\Models\Rencana;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function klien()
    {
        return view('superadmin.laporan.klien');
    }
    public function dokumen()
    {
        return view('superadmin.laporan.dokumen');
    }
    public function verifikasi()
    {
        return view('superadmin.laporan.verifikasi');
    }
    public function evaluasi()
    {
        return view('superadmin.laporan.evaluasi');
    }
    public function index()
    {
        return view('superadmin.laporan.index');
    }
    public function pilih()
    {
        $jenis = request()->get('jenis');
        if ($jenis == '1') {
            $data = Bahan::get();
            $pdf = Pdf::loadView('superadmin.laporan.pdf_bahan', compact('data'))->setPaper('a4', 'landscape');;
            return $pdf->stream();
        }

        if ($jenis == '2') {
            $data = Jenis::get();
            $pdf = Pdf::loadView('superadmin.laporan.pdf_jenis', compact('data'))->setPaper('a4', 'landscape');;
            return $pdf->stream();
        }

        if ($jenis == '3') {
            $data = Biaya::get();
            $pdf = Pdf::loadView('superadmin.laporan.pdf_biaya', compact('data'))->setPaper('a4', 'landscape');;
            return $pdf->stream();
        }

        if ($jenis == '4') {
            $data = Jurnal::get();
            $pdf = Pdf::loadView('superadmin.laporan.pdf_jurnal', compact('data'))->setPaper('a4', 'landscape');;
            return $pdf->stream();
        }
    }

    public function pdfdokumen()
    {
        $bulan = request()->get('bulan');
        $tahun = request()->get('tahun');

        $data = Dokumen::whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)->get();
        $pdf = Pdf::loadView('superadmin.laporan.pdf_dokumen', compact('data', 'bulan', 'tahun'))->setPaper('a4', 'landscape');;
        return $pdf->stream();
    }

    public function pdfevaluasi()
    {
        $bulan = request()->get('bulan');
        $tahun = request()->get('tahun');

        $data = Evaluasi::whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)->get();
        $pdf = Pdf::loadView('superadmin.laporan.pdf_evaluasi', compact('data', 'bulan', 'tahun'))->setPaper('a4', 'landscape');;
        return $pdf->stream();
    }


    public function pdfverifikasi()
    {
        $bulan = request()->get('bulan');
        $tahun = request()->get('tahun');

        $data = Verifikasi::whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)->get();
        $pdf = Pdf::loadView('superadmin.laporan.pdf_verifikasi', compact('data', 'bulan', 'tahun'))->setPaper('a4', 'landscape');;
        return $pdf->stream();
    }


    public function bulan()
    {
        $bulan = request()->get('bulan');
        $tahun = request()->get('tahun');
        if (request()->get('jenis') == '1') {
            $data = Penerima::whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->where('status', null)
                ->get();
            $pdf = Pdf::loadView('superadmin.laporan.pdf_calon', compact('data', 'bulan', 'tahun'))->setPaper('a4', 'landscape');;
            return $pdf->stream();
        }
        if (request()->get('jenis') == '2') {
            $data = Penerima::whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->where('status', 'diterima')
                ->get();
            $pdf = Pdf::loadView('superadmin.laporan.pdf_penerima', compact('data', 'bulan', 'tahun'))->setPaper('a4', 'landscape');;
            return $pdf->stream();
        }
        if (request()->get('jenis') == '3') {
            $data = Distribusi::whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->get();
            $pdf = Pdf::loadView('superadmin.laporan.pdf_distribusi', compact('data', 'bulan', 'tahun'))->setPaper('a4', 'landscape');;
            return $pdf->stream();
        }
        if (request()->get('jenis') == '4') {
            $data = Pengaduan::whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->get();
            $pdf = Pdf::loadView('superadmin.laporan.pdf_pengaduan', compact('data', 'bulan', 'tahun'))->setPaper('a4', 'landscape');;
            return $pdf->stream();
        }
    }
}

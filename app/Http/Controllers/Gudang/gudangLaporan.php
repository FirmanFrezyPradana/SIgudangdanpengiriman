<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class gudangLaporan extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isGudang');
    }
    public function laporanBarang()
    {
        return view('gudang.Laporan.laporanbarang');
    }
    public function laporanStok()
    {
        return view('gudang.Laporan.laporanstok');
    }
    public function laporanBrgMasuk()
    {
        return view('gudang.Laporan.laporanbrgmasuk');
    }
    public function laporanpPenjualan()
    {
        return view('gudang.Laporan.laporanpenjualan');
    }
}

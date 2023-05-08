<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class laporanController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    public function laporanBarang()
    {
        return view('admin.Laporan.laporanbarang');
    }
    public function laporanStok()
    {
        return view('admin.Laporan.laporanstok');
    }
    public function laporanBrgMasuk()
    {
        return view('admin.Laporan.laporanbrgmasuk');
    }
    public function laporanpPenjualan()
    {
        return view('admin.Laporan.laporanpenjualan');
    }
}

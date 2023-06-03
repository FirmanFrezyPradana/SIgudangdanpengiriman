<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\tb_barang;
use App\Models\tb_brgmasuk;
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
        $data_stok = tb_barang::all();
        return view('admin.Laporan.laporanstok', ['data_stok' => $data_stok]);
    }
    public function laporanBrgMasuk()
    {
        $data_brgmsk = tb_brgmasuk::all();
        return view('admin.Laporan.laporanbrgmasuk', ['data_brgmsk' => $data_brgmsk]);
    }
    public function laporanpPenjualan()
    {
        return view('admin.Laporan.laporanpenjualan');
    }
}

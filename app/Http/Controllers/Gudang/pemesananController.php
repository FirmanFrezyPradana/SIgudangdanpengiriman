<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use App\Models\tb_jadwal;
use App\Models\tb_kendaraan;
use App\Models\tb_sopir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pemesananController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isGudang');
    }
    public function index()
    {
        // $data_pemesanan = DB::table('tb_pemesanans')
        //     ->select('kode_pemesanan', 'id_outlet', 'tanggal_pemesanan', 'status_pemesanan')
        //     ->distinct()
        //     ->where('status_pemesanan', 'Belum Diproses')
        //     ->get();
        $data_pemesanan = DB::table('tb_outlets')
            ->join('tb_pemesanans', 'tb_outlets.id', '=', 'tb_pemesanans.id_outlet')
            ->where('tb_pemesanans.status_pemesanan', '=', 'Belum Diproses')
            ->select('tb_pemesanans.kode_pemesanan', 'tb_outlets.nama_outlet', 'tb_pemesanans.tanggal_pemesanan', 'tb_pemesanans.status_pemesanan')
            ->distinct()
            ->get();
        $data_kendaraan = tb_kendaraan::all();
        $data_jadwal = tb_jadwal::all();
        $data_sopir = tb_sopir::all();

        $array = [
            'data_pemesanan' => $data_pemesanan,
            'data_kendaraan' => $data_kendaraan,
            'data_jadwal' => $data_jadwal,
            'data_sopir' => $data_sopir,
        ];
        return view('gudang.Pemesanan.index', $array);
    }
    public function pemesanan()
    {
        return view('gudang.Pemesanan.pemesanan');
    }
}

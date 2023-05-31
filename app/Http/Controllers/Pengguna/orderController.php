<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\tb_jadwal;
use App\Models\tb_kendaraan;
use App\Models\tb_pemesanan;
use App\Models\tb_sopir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class orderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isPengguna');
    }
    public function index()
    {
        $data_pemesanan =  DB::table('tb_pemesanans')
            ->distinct()
            ->get(['kode_pemesanan', 'id_outlet', 'tanggal_pemesanan', 'status_pemesanan']);
        $data_kendaraan = tb_kendaraan::all();
        $data_jadwal = tb_jadwal::all();
        $data_sopir = tb_sopir::all();
        $array = [
            'data_pemesanan' => $data_pemesanan,
            'data_kendaraan' => $data_kendaraan,
            'data_jadwal' => $data_jadwal,
            'data_sopir' => $data_sopir,
        ];
        return view('pengguna.Pemesanan.index', $array);
    }

    public function pengiriman()
    {
        return view('Pengguna.Pengiriman.index');
    }
    public function history()
    {
        return view('Pengguna.History.index');
    }
}

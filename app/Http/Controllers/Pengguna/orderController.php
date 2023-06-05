<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\tb_jadwal;
use App\Models\tb_kendaraan;
use App\Models\tb_pemesanan;
use App\Models\tb_pengiriman;
use App\Models\tb_rute;
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
        $user = auth()->id();
        $data_pemesanan = DB::table('tb_outlets')
            ->join('tb_pemesanans', 'tb_outlets.id', '=', 'tb_pemesanans.id_outlet')
            ->where('tb_pemesanans.user_id', '=', $user)
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
        return view('pengguna.Pemesanan.index', $array);
    }

    public function pengiriman()
    {
        $user = auth()->id();
        // $data_pengiriman = DB::table('tb_pengiriman')
        //     ->join('tb_pemesanans', 'tb_pengiriman.pemesanan_kode', '=', 'tb_pemesanans.kode_pemesanan')
        //     ->distinct()
        //     ->where('tb_pemesanans.user_id', '=', $user)
        //     ->where('tb_pengiriman.status', '!=', 'Pesanan Selesai')
        //     ->select('tb_pengiriman.*')
        //     ->get();
        $data_pengiriman = tb_pengiriman::with('pemesanan','kendaraan','jadwal','sopir')->get();
        // dd($data_pengiriman);
        return view('Pengguna.Pengiriman.index', ['data_pengiriman' => $data_pengiriman]);
    }

    public function history()
    {
        $rute = tb_rute::all()
            ->where('track_rute', 'Pesanan diterima');
        return view('Pengguna.History.index', ['rute' => $rute]);
    }
    public function invoiceHistory($id)
    {
        $kode = tb_rute::find($id);
        dd($kode);
    }
}

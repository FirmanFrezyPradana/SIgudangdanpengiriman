<?php

namespace App\Http\Controllers\Sopir;

use App\Http\Controllers\Controller;
use App\Models\tb_pemesanan;
use App\Models\tb_pengiriman;
use App\Models\tb_rute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class trackController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isSopir');
    }
    public function index()
    {
        $user = auth()->id();
        $data_pengiriman = tb_pengiriman::where('status', 'Sedang Diproses')
            // ->orWhere('id_sopir', $user)
            ->get();
        return view('Sopir.Track.index', ['data_pengiriman' => $data_pengiriman]);
    }
    public function store(Request $request)
    {
        $input = $request->input('track_rute');
        $input = strtolower($input);
        if ($input === 'pesanan diterima') {
            $validate = $request->validate([
                'kode_invoice' => ' ',
                'tanggal_waktu' => '',
                'track_rute' => '',
            ]);
            tb_pemesanan::where('kode_pemesanan',  $validate['kode_invoice'])
                ->update([
                    'status_pemesanan' => "Pesanan Selesai",
                ]);
            tb_pengiriman::where('pemesanan_kode',  $validate['kode_invoice'])
                ->update([
                    'status' => "Pesanan Selesai",
                ]);
            tb_rute::create($validate);
        } else {
            $validate = $request->validate([
                'kode_invoice' => ' ',
                'tanggal_waktu' => '',
                'track_rute' => '',
            ]);
            tb_rute::create($validate);
        }
        return redirect()->route('TrackBaru');
    }
}

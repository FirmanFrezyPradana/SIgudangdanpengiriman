<?php

namespace App\Http\Controllers\Sopir;

use Illuminate\Support\Facades\Validator;
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
        $validate = $request->validate([
            'kode_invoice' => 'required',
            'tanggal_waktu' => 'required',
            'track_rute' => 'required',
        ]);
        if ($input === 'pesanan diterima') {
            tb_pemesanan::where('kode_pemesanan',  $validate['kode_invoice'])
                ->update([
                    'status_pemesanan' => "Pesanan Selesai",
                ]);
            tb_pengiriman::where('pemesanan_kode',  $validate['kode_invoice'])
                ->update([
                    'status' => "Pesanan Selesai",
                ]);

        }
        $rute = new tb_rute(['kode_invoice' => $request->kode_invoice, 'tanggal_waktu' => $request->tanggal_waktu, 'track_rute' => $request->track_rute]);
        $rute->save();

        return redirect()->route('TrackBaru');
    }
}

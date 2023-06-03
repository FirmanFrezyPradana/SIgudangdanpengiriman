<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use App\Models\tb_barang;
use App\Models\tb_brgmasuk;
use App\Models\tb_pemesanan;
use App\Models\tb_pengiriman;
use Illuminate\Http\Request;

class pengirimanController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isGudang');
    }
    public function index()
    {
        $data_pengiriman = tb_pengiriman::all();

        return view('gudang.pengiriman.index', ['data_pengiriman' => $data_pengiriman]);
    }

    public function store(Request $request)
    {
        
        $gudangs = new tb_pengiriman([
            'pemesanan_kode' => $request->pemesanan_kode,
            'id_kendaraan' => $request->id_kendaraan,
            'id_jadwal' => $request->id_jadwal,
            'id_sopir' => $request->id_sopir,
            'status' => $request->status,
        ]);
        // dd($gudangs);
        tb_pemesanan::where('kode_pemesanan',  $request->pemesanan_kode)
            ->update([
                'status_pemesanan' => "Diproses Gudang",
            ]);
        $gudangs->save();
        return redirect()->route('pengiriman');
    }
}

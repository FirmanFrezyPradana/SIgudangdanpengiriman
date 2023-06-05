<?php

namespace App\Http\Controllers\Sopir;

use App\Http\Controllers\Controller;
use App\Models\tb_jadwal;
use App\Models\tb_pengiriman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardSopir extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isSopir');
    }
    public function index()
    {
        $user = auth()->id();
        $count = tb_pengiriman::where('id', $user)->count();
        $data_sopir = User::where('id', $user)->get();
        $array = [
            'data_sopir' => $data_sopir,
            'count' => $count,
        ];
        return view('Sopir.dashboard', $array);
    }
    public function history()
    {
        $user = auth()->id();
        $data_pengiriman_selesai = tb_pengiriman::where('status', 'Pesanan Selesai')
            ->orWhere('id_sopir', $user)
            ->get();
        return view('Sopir.History.index', ['data_pengiriman_selesai' => $data_pengiriman_selesai]);
    }
    public function jadwal()
    {
        $data_jadwal = tb_jadwal::all();
        return view('Sopir.jadwal.index', ['data_jadwal' => $data_jadwal]);
    }
}

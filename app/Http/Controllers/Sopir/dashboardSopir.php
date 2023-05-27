<?php

namespace App\Http\Controllers\Sopir;

use App\Http\Controllers\Controller;
use App\Models\tb_jadwal;
use App\Models\User;
use Illuminate\Http\Request;

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
        $data_sopir = User::where('id', $user)->get();
        return view('Sopir.dashboard', ['data_sopir' => $data_sopir]);
    }
    public function history()
    {
        return view('Sopir.History.index');
    }
    public function jadwal()
    {
        $data_jadwal = tb_jadwal::all();
        return view('Sopir.jadwal.index', ['data_jadwal' => $data_jadwal]);
    }
}

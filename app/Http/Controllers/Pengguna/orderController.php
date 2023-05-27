<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class orderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isPengguna');
    }
    public function index()
    {
        return view('pengguna.Pemesanan.index');
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

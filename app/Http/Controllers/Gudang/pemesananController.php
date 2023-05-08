<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class pemesananController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isGudang');
    }
    public function index()
    {
        return view('gudang.Pemesanan.index');
    }
    public function pemesanan()
    {
        return view('gudang.Pemesanan.pemesanan');
    }
}

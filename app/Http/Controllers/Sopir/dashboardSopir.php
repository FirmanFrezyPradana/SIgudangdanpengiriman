<?php

namespace App\Http\Controllers\Sopir;

use App\Http\Controllers\Controller;
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
        return view('Sopir.dashboard');
    }
    public function history()
    {
        return view('Sopir.History.index');
    }
    public function jadwal()
    {
        return view('Sopir.jadwal.index');
    }

}

<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardPengguna extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isPengguna');
    }
    public function index()
    {
        $data_pengguna = user::all();
        return view('Pengguna.dashboard');
    }
}

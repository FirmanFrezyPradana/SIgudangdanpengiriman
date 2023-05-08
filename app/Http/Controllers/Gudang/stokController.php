<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class stokController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isGudang');
    }
    public function index()
    {
        return view('gudang.brg_masuk.index');
    }
}

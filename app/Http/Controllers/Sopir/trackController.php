<?php

namespace App\Http\Controllers\Sopir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class trackController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isSopir');
    }
    public function index()
    {
        return view('Sopir.Track.index');
    }
}

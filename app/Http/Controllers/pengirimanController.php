<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pengirimanController extends Controller
{
    //
    public function index()
    {
        return view('admin.pengiriman.index');
    }
}

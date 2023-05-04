<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class outletController extends Controller
{
    //
    public function index()
    {
        return view('admin.outlet.index');
    }
}

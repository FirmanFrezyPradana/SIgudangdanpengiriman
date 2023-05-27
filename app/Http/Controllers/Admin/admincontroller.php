<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\tb_gudang;

class admincontroller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    public function index()
    {
       
        return view('admin/dashboard');
    }

}

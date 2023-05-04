<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class pengunaController extends Controller
{
    //
    public function index()
    {
        $data_pegguna = User::all();
        return view('admin.pengguna.index', ['data_pegguna' => $data_pegguna]);
    }
}

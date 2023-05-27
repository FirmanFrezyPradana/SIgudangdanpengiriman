<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\tb_outlet;
use Illuminate\Http\Request;

class outletPenguna extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isPengguna');
    }
    public function index()
    {
        $user = auth()->id();
        $data_outlet = tb_outlet::where('id_user', $user)->get();
        return view('Pengguna.Outlet.index', ['data_outlet' => $data_outlet]);
    }
    public function store(Request $request)
    {
        $outlet = new tb_outlet([
            'nama_outlet' => $request->nama_outlet,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'id_user' => auth()->user()->id,
        ]);
        $outlet->save();
        return redirect()->route('outletpengguna');
    }
}

<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\tb_gudang;
use App\Models\tb_outlet;
use App\Models\tb_rute;
use App\Models\User;
use Termwind\Components\Dd;

class admincontroller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    public function index()
    {
        $pegawai_gudang = User::where('id_pegawai', 2)->count();
        $pegawai_sopir = User::where('id_pegawai', 4)->count();
        $pemilik_outlet = User::where('id_pegawai', 3)->count();
        $gudang = tb_gudang::count();
        $outlet = tb_outlet::count();


        $array = [
            'pegawai_gudang' => $pegawai_gudang,
            'pegawai_sopir' => $pegawai_sopir,
            'pemilik_outlet' => $pemilik_outlet,
            'gudang' => $gudang,
            'outlet' => $outlet,

        ];
        return view('admin/dashboard', $array);
    }
    public function trackRute(Request $request)
    {
        $input = $request->kode_pengiriman;
        // Lakukan pencarian berdasarkan input
        $results = tb_rute::where('kode_invoice', 'like', '%' . $input . '%')->get();

        // Return hasil pencarian dalam format JSON
        return response()->json($results);
    }
}

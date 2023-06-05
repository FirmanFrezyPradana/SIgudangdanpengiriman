<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\tb_outlet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class outletController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    public function index()
    {
        $data_pengguna = User::all()->where('id_pegawai', '3');
        $data_outlet = DB::table('users')
            ->join('tb_outlets', 'users.id', '=', 'tb_outlets.id_user')
            ->get();
        $array = [
            'data_outlet' => $data_outlet,
            'data_pengguna' => $data_pengguna,
        ];
        return view('admin.outlet.index', $array);
    }
    public function store(Request $request)
    {
        $outlet = new tb_outlet([
            'nama_outlet' => $request->nama_outlet,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'id_user' => $request->user_id
        ]);
        $outlet->save();
        return redirect()->route('outlet');
    }
}

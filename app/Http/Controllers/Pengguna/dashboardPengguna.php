<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\tb_outlet;
use App\Models\tb_rute;
use Illuminate\Http\Request;
use App\Models\User;

class dashboardPengguna extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isPengguna');
    }
    public function index()
    {
        $user = auth()->id();
        $tb_outlet = tb_outlet::where('id_user', $user)->count();
        $data_pengguna = user::where('id', $user)->get();
        $array = [
            'data_pengguna' => $data_pengguna,
            'tb_outlet' => $tb_outlet,

        ];
        return view('Pengguna.dashboard', $array);
    }

    public function update(Request $request)
    {
        User::find($request->id)->update([
            'nama_pengguna' => $request->nama_pengguna,
            'alamat' => $request->alamat,
            'telepon_pengguna' => $request->telepon_pengguna,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return redirect()->route('penggunadashboard')->with('message', 'Berhasil Update');
    }
    public function cari(Request $request)
    {
        $results = tb_rute::where('kode_invoice', 'like', '%' . $request->kode_pengiriman . '%')->get();
        return view('penggunadashboard', ['results' => $results]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\tb_outlet;
use App\Models\tb_pegawai;
use App\Models\tb_pemesanan;
use App\Models\tb_sopir;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pengunaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    public function index()
    {
        $data_pegguna = User::all();
        // ->join('tb_pegawais', 'tb_pegawais.id', '=', 'users.id_pegawai')
        // ->get();
        $data_pegawai = tb_pegawai::all();
        $array = [
            'data_pengguna' => $data_pegguna,
            'data_pegawai' => $data_pegawai,
        ];
        return view('admin.pengguna.index', $array);
    }
    public function updateStatus(Request $request)
    {
        //dd($request->id);
        $id = $request->id;
        User::where('id', $id)->update([
            'status' => $request->status,
        ]);
        return redirect()->route('pengguna')->with('message', 'Berhasil Update');
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_pengguna' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'status' => '',
            'id_pegawai' => 'required',
        ]);
        $validate['password'] = bcrypt($validate['password']);
        User::create($validate);
        return redirect()->route('pengguna');
    }

    public function destroy($id)
    {
        tb_pemesanan::where('user_id', $id)->delete();
        tb_sopir::Where('id_user', $id)->delete();
        tb_outlet::where('id_user', $id)->delete();
        User::find($id)->delete();
        return redirect()->route('pengguna')->with('message', 'Berhasil Dihapus');
    }
}

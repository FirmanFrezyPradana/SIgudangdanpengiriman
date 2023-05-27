<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\tb_sopir;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sopirController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    public function index()
    {
        $data_pegguna = DB::table('users')
            ->join('tb_sopirs', 'users.id', '=', 'tb_sopirs.id_user')
            ->get();
        $data_pegguna2 = User::where('id_pegawai', '=', 4)
            ->where('status', '=', 'Sudah Verifikasi')
            ->get();
        $array = [
            'data_pengguna' => $data_pegguna,
            'data_pengguna2' => $data_pegguna2,
        ];
        return view('admin.sopir.index', $array);
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'id_user' => 'required',
            'SIM' => '',
            'status' => 'required'
        ]);
        tb_sopir::create($validate);
        return redirect()->route('sopir');
    }
    public function destroy($id)
    {
        tb_sopir::find($id)->delete();
        return redirect()->route('sopir')->with('message', 'Berhasil Dihapus');
    }
}

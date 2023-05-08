<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\tb_pegawai;
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
        $data_pegguna = DB::table('users')
            ->join('tb_pegawais', 'tb_pegawais.id', '=', 'users.id_pegawai')
            ->get();
        $data_pegawai = tb_pegawai::all();
        $array = [
            'data_pengguna' => $data_pegguna,
            'data_pegawai' => $data_pegawai,
        ];
        return view('admin.pengguna.index', $array);
    }
    public function index2()
    {

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\tb_pegawai;
use Illuminate\Http\Request;

class hakaksesController extends Controller
{
    //
    public function index()
    {
        $data_pegawai = tb_pegawai::all();
        return view('hakakses', ['data_pegawai' => $data_pegawai]);
    }
    public function actionTambah(Request $request)
    {
        $validate = $request->validate([
            'hak_akses' => 'required',
        ]);
        tb_pegawai::create($validate);
        return redirect()->route('hakakses');
    }
}

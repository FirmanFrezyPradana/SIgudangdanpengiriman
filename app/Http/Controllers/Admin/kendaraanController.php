<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\tb_kendaraan;
use Illuminate\Http\Request;

class kendaraanController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    public function index()
    {
        $data_kendaraan = tb_kendaraan::all();
        return view('admin.kendaran.index', ['data_kendaraan' => $data_kendaraan]);
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nomor_polisi' => 'required',
            'jenis_kendaraan' => 'required',
            'jenis_bbm' => 'required',
        ]);
        tb_kendaraan::create($validate);
        return redirect()->route('kendarann');
    }
    public function destroy($id)
    {
        tb_kendaraan::find($id)->delete();
        return redirect()->route('kendarann')->with('message', 'Berhasil Dihapus');
    }
    public function update(Request $request)
    {
        tb_kendaraan::find($request->id)->update([
            'nomor_polisi' => $request->nomor_polisi,
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'jenis_bbm' => $request->jenis_bbm,
        ]);
        return redirect()->route('kendarann')->with('message', 'Berhasil Update');
    }
}

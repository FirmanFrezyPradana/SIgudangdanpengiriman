<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\tb_jadwal;
use Illuminate\Http\Request;

class jadwalController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    public function index()
    {
        $data_jadwal = tb_jadwal::all();
        return view('admin.jadwal.index', ['data_jadwal' => $data_jadwal]);
    }
    public function store(Request $request)
    {
        $validate = new tb_jadwal([
            'sesi_pengiriman' => $request->sesi_pengiriman,
            'jam_berangkat' => $request->jam_berangkat,
            'tujuan' => $request->tujuan,
            'total_jarak_tempuh' => $request->total_jarak_tempuh,
        ]);
        $validate->save();
        return redirect()->route('jadwal');
    }
    public function destroy($id)
    {
        tb_jadwal::find($id)->delete();
        return redirect()->route('jadwal')->with('message', 'Berhasil Dihapus');
    }
    public function update(Request $request)
    {
        tb_jadwal::find($request->id)->update([
            'sesi_pengiriman' => $request->sesi_pengiriman,
            'jam_berangkat' => $request->jam_berangkat,
            'tujuan' => $request->tujuan,
            'total_jarak_tempuh' => $request->total_jarak_tempuh,
        ]);

        return redirect()->route('jadwal')->with('message', 'Berhasil Update');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\tb_pegawai;
use Illuminate\Http\Request;

class hakaksesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    public function index()
    {
        $data_pegawai = tb_pegawai::all();
        return view('admin.hakakses.index', ['data_pegawai' => $data_pegawai]);
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'hak_akses' => 'required',
        ]);
        tb_pegawai::create($validate);
        return redirect()->route('hakakses');
    }
    public function destroy($id)
    {
        tb_pegawai::find($id)->delete();
        return redirect()->route('hakakses')->with('message', 'Berhasil Dihapus');
    }
    public function update(Request $request)
    {
        tb_pegawai::find($request->id)->update([
            'hak_akses' => $request->hak_akses,
        ]);
        return redirect()->route('hakakses')->with('message', 'Berhasil Update');
    }
}

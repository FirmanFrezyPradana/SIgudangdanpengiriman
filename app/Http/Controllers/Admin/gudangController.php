<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\tb_gudang;
use Illuminate\Http\Request;

class gudangController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $data_gudang = tb_gudang::all();
        return view('admin.gudang.index', ['data_gudang' => $data_gudang]);
    }
    
    public function store(Request $request)
    {
        $gudangs = new tb_gudang([
            'nama_gudang' => $request->nama_gudang,
            'alamat' => $request->alamat,
        ]);
        $gudangs->save();
        return redirect()->route('gudang');
    }

    public function update(Request $request)
    {
        tb_gudang::find($request->id)->update([
            'nama_gudang' => $request->nama_gudang,
            'alamat' => $request->alamat,
        ]);
        return redirect()->route('gudang')->with('message', 'Berhasil Update');
    }

    public function destroy($id)
    {
        tb_gudang::find($id)->delete();
        return redirect()->route('gudang')->with('message', 'Berhasil Dihapus');
    }
}

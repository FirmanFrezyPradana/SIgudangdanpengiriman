<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use App\Models\tb_kategori;
use App\Models\tb_kendaraan;
use Illuminate\Http\Request;

class kategoriController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isGudang');
    }
    public function index()
    {
        $data_kategori = tb_kategori::all();
        return view('gudang.kategori.index', ['data_kategori' => $data_kategori]);
    }
    public function store(Request $request)
    {
        $kategori = new tb_kategori([
            'nama_kategori' => $request->nama_kategori,
        ]);
        $kategori->save();
        return redirect()->route('kategori');
    }
    public function destroy($id)
    {
        tb_kategori::find($id)->delete();
        return redirect()->route('kategori')->with('message', 'Berhasil Dihapus');
    }
    public function update(Request $request)
    {
        tb_kategori::find($request->id)->update([
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect()->route('kategori')->with('message', 'Berhasil Update');
    }
}

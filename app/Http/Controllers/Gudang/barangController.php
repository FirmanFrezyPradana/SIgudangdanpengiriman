<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use App\Models\tb_barang;
use App\Models\tb_gudang;
use App\Models\tb_kategori;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class barangController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isGudang');
    }
    public function index()
    {
        $data_gudang = tb_gudang::all();
        $data_kategori = tb_kategori::all();
        $data_barang = tb_barang::all();
        $array = [
            'data_gudang' => $data_gudang,
            'data_kategori' => $data_kategori,
            'data_barang' => $data_barang,
        ];
        return view('gudang.Barang.index', $array);
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'id_gudang' => 'required',
            'id_kategori' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'stoke_awal' => '',
            'stoke_masuk' => '',
            'stoke_keluar' => '',
        ]);

        $validate['stoke_akhir'] = $validate['stoke_awal'];
        $validate['stoke_masuk'] = "0";
        $validate['stoke_keluar'] = "0";
        tb_barang::create($validate);
        return redirect()->route('barang');
    }
    public function destroy($id)
    {
        tb_barang::find($id)->delete();
        return redirect()->route('barang');
    }
    public function update(Request $request)
    {
        tb_barang::find($request->id)->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'id_gudang' => $request->id_gudang,
            'id_kategori' => $request->id_kategori,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'stoke_awal' => $request->stoke_awal,
        ]);
        return redirect()->route('barang')->with('message', 'Berhasil Update');
    }
}

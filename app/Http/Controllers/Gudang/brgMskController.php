<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use App\Models\tb_barang;
use App\Models\tb_brgmasuk;
use Illuminate\Http\Request;

class brgMskController extends Controller
{
    public function __construct()
    {
        $this->middleware('isGudang');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_barangMasuk = tb_brgmasuk::all();
        $data_barang = tb_barang::all();

        $array = [
            'data_barangMasuk' => $data_barangMasuk,
            'data_barang' => $data_barang,

        ];
        return view('gudang.brg_masuk.index', $array);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'kode_masuk' => 'required',
            'id_barang' => 'required',
            'stoke_masuk' => 'required',
            'tanggal_masuk' => 'required',
        ]);
        tb_brgmasuk::create($validate);
        $barang = tb_barang::find($request->id_barang);
        $barang->stoke_masuk += $request->stoke_masuk;
        $barang->stoke_akhir += $request->stoke_masuk;
        $barang->save();
        return redirect()->route('brg_masuk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validate = $request->validate([
            'id' => 'required',
            'id_barang' => 'required',
            'stoke_masuk' => 'required',
            'tanggal_masuk' => 'required',
        ]);
        $barang = tb_barang::find($validate['id_barang']);
        $brg_masuk = tb_brgmasuk::find($validate['id']);

        $barang->stoke_masuk -= $brg_masuk->stoke_masuk; // kurangi stok_masuk dengan jumlah sebelumnya
        $barang->stoke_akhir -= $brg_masuk->stoke_masuk; // kurangi stok_akhir dengan jumlah sebelumnya

        $barang->stoke_masuk += $request->stoke_masuk; // tambahkan stok_masuk dengan jumlah baru
        $barang->stoke_akhir += $request->stoke_masuk; // tambahkan stok_akhir dengan jumlah baru
        $barang->save();

        tb_brgmasuk::where('id', $request->id)->update([
            'id_barang' => $request->id_barang,
            'stoke_masuk' => $request->stoke_masuk,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);
        return redirect()->route('brg_masuk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $brg_masuk = tb_brgmasuk::find($request->id);
        $barang = tb_barang::find($request->id_brng);

        $barang->stoke_masuk -= $brg_masuk->stoke_masuk;
        $barang->stoke_akhir -= $brg_masuk->stoke_masuk;
        $barang->save();


        $brg_masuk->delete();
        return redirect()->route('brg_masuk')->with('success', 'Data Barang Masuk Berhasil Dihapus');
    }
}

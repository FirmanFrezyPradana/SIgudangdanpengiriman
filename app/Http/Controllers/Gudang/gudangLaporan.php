<?php

namespace App\Http\Controllers\Gudang;

use Barryvdh\DomPDF\Facade\PDF;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use App\Http\Controllers\Controller;
use App\Models\tb_barang;
use App\Models\tb_brgmasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class gudangLaporan extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('isGudang');
    }
    public function laporanBrgkeluar()
    {
        $data_brgkeluar = DB::table('dashboard_gudangs')
            ->join('tb_barangs', 'dashboard_gudangs.id_barang', '=', 'tb_barangs.id')
            ->select('dashboard_gudangs.tanggal_keluar', 'tb_barangs.nama_barang', DB::raw('SUM(dashboard_gudangs.stoke_keluar) as total'))
            ->groupBy('dashboard_gudangs.tanggal_keluar', 'tb_barangs.nama_barang')
            ->get();
        return view('gudang.Laporan.laporanbrgKeluar', ['data_brgkeluar' => $data_brgkeluar]);
    }
    public function laporanStok()
    {
        $data_stok = tb_barang::all();
        return view('gudang.Laporan.laporanstok', ['data_stok' => $data_stok]);
    }
    public function laporanBrgMasuk()
    {
        $data_brgmsk = tb_brgmasuk::with('barang');

        return view('gudang.Laporan.laporanbrgmasuk', ['data_brgmsk' => $data_brgmsk]);
    }
    public function laporanpPenjualan()
    {
        $data_pemesanan = DB::table('tb_outlets')
            ->join('tb_pemesanans', 'tb_outlets.id', '=', 'tb_pemesanans.id_outlet')
            ->select('tb_pemesanans.kode_pemesanan', 'tb_outlets.nama_outlet', 'tb_pemesanans.tanggal_pemesanan', 'tb_pemesanans.status_pemesanan', 'tb_pemesanans.total_pemesanan')
            ->distinct()
            ->get();
        // dd($data_penjualan->jumlah_pesanan);
        return view('gudang.Laporan.laporanpenjualan', ['data_pemesanan' => $data_pemesanan]);
    }
    public function printPenjualanPDFgudang()
    {
        $datas = DB::table('tb_outlets')
            ->join('tb_pemesanans', 'tb_outlets.id', '=', 'tb_pemesanans.id_outlet')
            ->select('tb_pemesanans.kode_pemesanan', 'tb_outlets.nama_outlet', 'tb_pemesanans.tanggal_pemesanan', 'tb_pemesanans.status_pemesanan', 'tb_pemesanans.total_pemesanan')
            ->distinct()
            ->get();
        $pdf = App::make('dompdf.wrapper');
        $html = '<center><h3>Data Penjualan</h3></center><hr/><br>';
        $html .= '<table border=1 width="100%">
             <tr style="border: 1px solid #000; padding: 8px;">
                <th>No</th>
                <th>Tanggal</th>
                <th>Kode Invoice</th>
                <th>Total Pesanan</th>
                <th>Nama Outlet</th>
             </tr>';
        $no = 1;
        foreach ($datas as $data) {
            $html .= "<tr style='text-align: center'>
             <td>" . $no++ . "</td>
             <td>" . $data->tanggal_pemesanan . "</td>
             <td>" . $data->kode_pemesanan . "</td>
             <td>" . $data->total_pemesanan . "</td>
             <td>" . $data->nama_outlet . "</td>
             </tr>";
        }
        $html .= "</html>";
        $pdf = Pdf::loadHTML($html)->setPaper('a4', 'landscape');
        return $pdf->stream('Pejualan.pdf');
    }
    public function printBrgMskPDFgudang()
    {
        $datas = tb_brgmasuk::with('barang');
        $pdf = App::make('dompdf.wrapper');
        $html = '<center><h3>Data Barang Masuk</h3></center><hr/><br>';
        $html .= '<table border=1 width="100%">
			<tr style="border: 1px solid #000; padding: 8px;">
                <th>No</th>
                <th>Tanggal</th>
                <th>Kode Invoice Masuk</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
			</tr>';
        $no = 1;
        foreach ($datas as $data) {
            $html .= "<tr style='text-align: center'>
            <td>" . $no++ . "</td>
            <td>" . $data->tanggal_masuk . "</td>
            <td>" . $data->kode_masuk . "</td>
            <td>" . $data->barang->kode_barang . "</td>
            <td>" . $data->barang->nama_barang . "</td>
            <td>" . $data->stoke_masuk . "</td>
            </tr>";
        }
        $html .= "</html>";
        $pdf = Pdf::loadHTML($html)->setPaper('a4', 'landscape');
        return $pdf->stream('BarangMasuk.pdf');
    }
    // print PDF Stok
    public function  printStokPDFgudang()
    {
        $datas = tb_barang::all();
        $pdf = App::make('dompdf.wrapper');
        $html = '<center><h3>Data Stok Barang</h3></center><hr/><br>';
        $html .= '<table border=1 width="100%">
                <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Stok Awal</th>
                <th>Harga Barang</th>
                <th>
                    <table>
                        <tr>
                            <th>Mutasi</th>
                        </tr>
                        <tr>
                            <th>In</th>
                            <th>Out</th>
                        </tr>
                    </table>
                </th>
                <th>Stok Akhir</th>
            </tr>';
        $no = 1;
        foreach ($datas as $data) {
            $html .= "<tr style='text-align: center'>
                <td>" . $no++ . "</td>
                <td>" . $data->kode_barang . "</td>
                <td>" . $data->nama_barang . "</td>
                <td>" . $data->stoke_awal . "</td>
                <td>" . $data->harga . "</td>
                <td>
                    <table>
                        <tr style='text-align: center; widht=100%'>
                            <th>" . $data->stoke_masuk . "</th>
                            <th>" . $data->stoke_keluar . "</th>
                        </tr>
                    </table>
                </td>
                <td>
                    " . $data->stoke_akhir . "
                </td>
                </tr>";
        }
        $html .= "</html>";
        $pdf = Pdf::loadHTML($html)->setPaper('a4', 'landscape');
        return $pdf->stream('StokBarang.pdf');
    }
    public function printBrgkeluarPDFgudang()
    {
        $datas = DB::table('dashboard_gudangs')
            ->join('tb_barangs', 'dashboard_gudangs.id_barang', '=', 'tb_barangs.id')
            ->select('dashboard_gudangs.tanggal_keluar', 'tb_barangs.nama_barang', DB::raw('SUM(dashboard_gudangs.stoke_keluar) as total'))
            ->groupBy('dashboard_gudangs.tanggal_keluar', 'tb_barangs.nama_barang')
            ->get();
        $pdf = App::make('dompdf.wrapper');
        $html = '<center><h3>Data Baarang Keluar</h3></center><hr/><br>';
        $html .= '<table border=1 width="100%">
			<tr style="border: 1px solid #000; padding: 8px;">
                <th>No</th>
                <th>Nama Barang</th>
                <th>Stok Keluar</th>
                <th>Tanggal</th>
			</tr>';
        $no = 1;
        foreach ($datas as $data) {
            $html .= "<tr style='text-align: center'>
            <td>" . $no++ . "</td>
            <td>" . $data->nama_barang . "</td>
            <td>" . $data->total . "</td>
            <td>" . $data->tanggal_keluar . "</td>
            </tr>";
        }
        $html .= "</html>";
        $pdf = Pdf::loadHTML($html)->setPaper('a4', 'landscape');
        return $pdf->stream('BarangMasuk.pdf');
    }
}

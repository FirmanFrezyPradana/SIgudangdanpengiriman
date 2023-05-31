<?php

namespace App\Http\Livewire;

use App\Models\tb_barang;
use App\Models\tb_outlet;
use App\Models\tb_pemesanan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Order extends Component
{
    use WithPagination;
    public $keranjang = [];
    public $search = '';
    public $totalHarga = 0;
    public $totalitem = 0;
    public $KodePemesanan;


    // ambil data dari form
    public $id_outlet;
    public $tangggal_pemesanan;


    protected $paginationTheme = 'tailwind';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function mount()
    {
        $selectedOptions = []; // Anda perlu mengisi ini dengan daftar opsi yang dipilih
        $pesananCount = count($selectedOptions);

        // Mendapatkan tanggal saat ini
        $currentDate = date('Y-m-d');

        // Mengambil ID outlet dari input
        $user = Auth::user()->id;

        // Mendapatkan pesanancount terakhir
        $latestOrder = tb_pemesanan::latest('created_at')->first();
        $latestKodePemesanan = $latestOrder ? $latestOrder->kode_pemesanan : null;

        if ($latestKodePemesanan) {
            // Extract nomor pesanan terakhir
            $lastOrderNumber = substr($latestKodePemesanan, strrpos($latestKodePemesanan, '-') + 1);

            // Kurangi nomor pesanan terakhir dengan 1
            $nextOrderNumber = (int) $lastOrderNumber - 1;

            // Tambahkan angka terakhir secara otomatis
            $nextOrderNumber = $lastOrderNumber + 1;

            // Bentuk kode pemesanan baru dengan angka terakhir yang ditambahkan
            $this->KodePemesanan = 'INV-' . date('Ymd', strtotime($currentDate)) . '-' . $user . '-' . str_pad($nextOrderNumber, strlen($lastOrderNumber), '0', STR_PAD_LEFT);
        } else {
            // Jika tidak ada pesanan sebelumnya, bentuk kode pemesanan baru
            $this->KodePemesanan = 'INV-' . date('Ymd', strtotime($currentDate)) . '-' . $user . '-001';
        }
    }

    public function addOrder(int $id)
    {
        $barang = tb_barang::find($id);
        $barang['qty'] = 1;
        if (!$this->checkArray('id', $barang->id, $this->keranjang)) {
            $this->keranjang[] = [
                'id' => $barang->id,
                'kode_barang' => $barang->kode_barang,
                'nama_barang' => $barang->nama_barang,
                'qty' => $barang->qty,
                'harga' => $barang->harga,
                'total' => ($barang->harga * $barang->qty),
            ];
        } else {
            //quantity dari keranjang id ini, quantity nya ditambah 1

        }

        $this->totalHarga = $this->totalHarga + $barang->harga;
        $this->totalitem = $this->totalitem + $barang->qty;
    }
    public function removeOrder($id)
    {
        $removedItem = null;

        foreach ($this->keranjang as $key => $item) {
            if ($item['id'] === $id) {
                $removedItem = $item;
                unset($this->keranjang[$key]);
                break;
            }
        }

        if ($removedItem) {
            $this->totalitem -= $removedItem['qty'];
            $this->totalHarga -= $removedItem['total'];
        }
    }

    public function checkArray($key, $value, $array)
    {
        foreach ($array as $k => $v) {
            if ($k === $key && $v === $value) {
                return true;
            }
        }

        return false;
    }

    public function decrementQty($index)
    {
        if ($this->keranjang[$index]['qty'] > 1) {
            $this->keranjang[$index]['qty']--;
            $this->updateTotal($index);
            $this->totalHarga = $this->totalHarga - $this->keranjang[$index]['harga'];
            $this->totalitem--;
        }
    }
    public function incrementQty($index)
    {
        $this->keranjang[$index]['qty']++;
        $this->updateTotal($index);
        $this->totalHarga = $this->totalHarga + $this->keranjang[$index]['harga'];
        $this->totalitem++;
    }
    public function updateTotal($index)
    {
        $this->keranjang[$index]['total'] = $this->keranjang[$index]['qty'] * $this->keranjang[$index]['harga'];
    }

    public function store()
    {
        foreach ($this->keranjang as $items) {
            $barang = tb_barang::find($items['id']);
            tb_pemesanan::create([
                'id_outlet' => $this->id_outlet,
                'id_barang' => $items['id'],
                'kode_pemesanan' => $this->KodePemesanan,
                'jumlah_pesanan' => $items['qty'],
                'satuan' => $barang->satuan,
                'total_harga' => $items['harga'],
                'total_pemesanan' => $items['total'],
                'tanggal_pemesanan' => $this->tangggal_pemesanan,
                'status_pemesanan' => 'Belum Diproses',
            ]);
        }
        // Mengosongkan keranjang setelah pesanan dibuat
        $this->keranjang = [];
        $this->totalHarga = 0;
        $this->totalitem = 0;
        // Menampilkan pesan sukses atau perintah lain setelah pesanan berhasil dibuat
        session()->flash('success', 'Pesanan berhasil dibuat!');
        return redirect()->route('PesanBarang');
    }

    public function render()
    {
        return view('livewire.order', [
            'outlets' => tb_outlet::where('id_user', Auth::user()->id)->get(),
            'orders' => tb_barang::where('kode_barang', 'like', '%' . $this->search . '%')
                ->orWhere('nama_barang', 'like', '%' . $this->search . '%')
                ->paginate(2),
            'keranjang' => $this->keranjang
        ]);
    }
}

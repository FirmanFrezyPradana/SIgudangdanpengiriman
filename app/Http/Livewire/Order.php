<?php

namespace App\Http\Livewire;

use App\Models\tb_barang;
use Livewire\Component;
use Livewire\WithPagination;

class Order extends Component
{
    use WithPagination;
    public $keranjang = [];
    public $search = '';
    public $totalHarga = 0;
    public $totalitem = 0;
    protected $paginationTheme = 'tailwind';

    public function updatingSearch()
    {
        $this->resetPage();
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
            // $this->keranjang[$id]['qty'] = ;
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

    public function render()
    {
        return view('livewire.order', [
            'orders' => tb_barang::where('kode_barang', 'like', '%' . $this->search . '%')
                ->orWhere('nama_barang', 'like', '%' . $this->search . '%')
                ->paginate(2),
            'keranjang' => $this->keranjang
        ]);
    }
}

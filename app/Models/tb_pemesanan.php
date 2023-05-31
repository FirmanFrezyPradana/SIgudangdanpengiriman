<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_pemesanan extends Model
{
    use HasFactory;

    protected $table = 'tb_pemesanans';
    protected $primarykey = 'id';

    protected $fillable = [
        'id_outlet',
        'id_barang',
        'kode_pemesanan',
        'jumlah_pesanan',
        'satuan',
        'total_harga',
        'total_pemesanan',
        'tanggal_pemesanan',
        'status_pemesanan',
    ];
    public function outlet()
    {
        return $this->hasMany(tb_outlet::class, 'id_outlet');
    }
    public function barang()
    {
        return $this->hasMany(tb_barang::class, 'id_barang');
    }
}

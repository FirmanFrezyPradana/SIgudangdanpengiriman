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
        'user_id',
        'id_barang',
        'kode_pemesanan',
        'jumlah_pesanan',
        'satuan',
        'total_harga',
        'total_pemesanan',
        'tanggal_pemesanan',
        'status_pemesanan',
    ];
    // public function pengiriman()
    // {
    //     return $this->hasMany(tb_pengiriman::class, 'kode_pemesanan', 'pemesanan_kode');
    // }

    public function outlet()
    {
        return $this->belongsTo(tb_outlet::class, 'id_outlet');
    }

    public function barang()
    {
        return $this->hasMany(tb_barang::class, 'id_barang');
    }
}

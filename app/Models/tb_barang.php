<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'id_gudang',
        'id_kategori',
        'satuan',
        'harga',
        'stoke_awal',
        'stoke_masuk',
        'stoke_keluar',
        'stoke_akhir',
    ];

    public function gudang()
    {
        return $this->belongsTo(tb_gudang::class, 'id_gudang');
    }
    public function kategori()
    {
        return $this->belongsTo(tb_kategori::class, 'id_kategori');
    }
}

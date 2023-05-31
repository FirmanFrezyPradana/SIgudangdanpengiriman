<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_pengiriman extends Model
{
    use HasFactory;
    protected $table = "tb_pengiriman";
    protected $primarykey = "id";
    protected $fillable = [
        'pemesanan_kode',
        'id_kendaraan',
        'id_jadwal',
        'id_sopir',
        'status',
    ];
}

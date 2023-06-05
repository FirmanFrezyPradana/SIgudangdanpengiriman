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
    public function pemesanan()
    {
        return $this->belongsTo(tb_pemesanan::class, 'pemesanan_kode','kode_pemesanan');
    }

    public function kendaraan()
    {
        return $this->belongsTo(tb_kendaraan::class, 'id_kendaraan');
    }

    public function jadwal()
    {
        return $this->belongsTo(tb_jadwal::class, 'id_jadwal');
    }
    public function sopir()
    {
        return $this->belongsTo(tb_sopir::class, 'id_sopir');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
    // public function rute()
    // {
    //     return $this->hasMany(tb_rute::class);
    // }
}

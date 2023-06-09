<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_brgmasuk extends Model
{
    use HasFactory;
    protected $primarykey = 'id';
    protected $fillable = [
        'kode_masuk',
        'id_barang',
        'stoke_masuk',
        'tanggal_masuk',
    ];

    public function barang()
    {
        return $this->belongsTo(tb_barang::class);
    }
}

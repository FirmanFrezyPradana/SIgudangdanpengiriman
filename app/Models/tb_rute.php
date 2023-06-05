<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_rute extends Model
{
    use HasFactory;
    protected $table = "tb_rutes";
    protected $primarykey = "id";
    protected $fillable = [
        'kode_invoice',
        'tanggal_waktu',
        'track_rute',
    ];

    // public function pengiriman()
    // {
    //     return $this->belongsTo(tb_pengiriman::class, 'kode_invoice');
    // }
}

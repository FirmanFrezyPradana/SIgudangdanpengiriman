<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_brgkeluar extends Model
{
    use HasFactory;
    protected $table = "dashboard_gudangs";
    protected $primarykey = "id";

    protected $fillable = [
        'kode_invoice',
        'id_barang',
        'stoke_keluar',
        'tanggal_keluar',
    ];
}

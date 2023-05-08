<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_jadwal extends Model
{
    use HasFactory;
    protected $table = 'tb_jadwals';
    protected $primarykey = 'id';

    protected $fillable = [
        'sesi_pengiriman',
        'jam_berangkat',
        'tujuan',
        'total_jarak_tempuh',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_kendaraan extends Model
{
    use HasFactory;
    protected $table = 'tb_kendaraans';
    protected $primarykey = 'id';

    protected $fillable = [
        'nomor_polisi',
        'jenis_kendaraan',
        'jenis_bbm',
    ];
}

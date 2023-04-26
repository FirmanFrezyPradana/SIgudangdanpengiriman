<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_pegawai extends Model
{
    use HasFactory;
    protected $table = 'tb_pegawais';
    protected $primarykey = 'id';

    protected $fillable = [
        'hak_akses',
    ];
}

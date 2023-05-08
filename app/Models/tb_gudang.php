<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_gudang extends Model
{
    use HasFactory;
    protected $table = "tb_gudangs";
    protected $primarykey = "id";

    protected $fillable = [
        'nama_gudang',
        'alamat',
    ];
}

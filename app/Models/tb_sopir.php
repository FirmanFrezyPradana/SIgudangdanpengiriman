<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_sopir extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'SIM',
        'status'
    ];
}

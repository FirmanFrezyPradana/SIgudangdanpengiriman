<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_sopir extends Model
{
    use HasFactory;
    protected $primarykey = 'id';
    protected $fillable = [
        'id',
        'id_user',
        'SIM',
        'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function loginData()
    {
        return $this->hasOne(User::class, 'id_user');
    }
    public function pengiriman(){
        return $this->hasMany(tb_pengiriman::class);
    }
}

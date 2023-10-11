<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'tanggal', 
        'status',
        'kode',
        'jumlah_harga'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function transaksi_detail(){
        return $this->hasMany(TransaksiDetail::class, 'transaksi_id', 'id');
    }

    public function transaksi(){
        return $this->hasMany(Transaksi::class, 'transaksi_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'barang_id',
        'transaksi_id', 
        'jumlah',
        'jumlah_harga'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function barang(){
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }

    public function transaksi_detail(){
        return $this->hasMany(TransaksiDetail::class, 'transaksi_detail_id', 'id');
    }

    public function transaksi(){
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'barang_id',
        'transaksi_detail_id',
        'transaksi_id', 
        'alamat',
        'provinsi',
        'alamat',
        'provinsi',
        'kota',
        'kodepos',
        'telepon',
        'email'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function barang(){
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }

    public function transaksi(){
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'id');
    }

    public function transaksi_detail(){
        return $this->belongsTo(TransaksiDetail::class, 'transaksi_detail_id', 'id');
    }
}

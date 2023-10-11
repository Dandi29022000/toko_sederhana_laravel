<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'kode_barang',
        'nama_barang',
        'pabrik',
        'satuan',
        'harga_jual',
        'gambar'
    ];

    public function transaksi_detail(){
        return $this->hasMany(TransaksiDetail::class, 'barang_id', 'id');
    }

    public function order(){
        return $this->hasMany(Order::class, 'barang_id', 'id');
    }
}

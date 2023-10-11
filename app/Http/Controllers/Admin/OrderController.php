<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
    	$transaksis = Transaksi::where('user_id', Auth::user()->id)->where('status', '!=',0)->get();

    	return view('frontend/package/orders/index', compact('transaksis'));
    }

    public function show($id)
    {
    	$transaksi = Transaksi::where('id', $id)->first();
    	$transaksi_details = TransaksiDetail::where('transaksi_id', $transaksi->id)->get();

     	return view('frontend/package/orders/detail', compact('transaksi','transaksi_details'));
    }

    public function konfirmasiWhatsApp()
    {
        $Transaksi = Transaksi::where('user_id', Auth::user()->id)->where('status', '!=',0)->first();
        $Transaksi_details = TransaksiDetail::where('transaksi_id', $Transaksi->id)->get();

        $tanggalPesan = $Transaksi->tanggal;

        // Mendapatkan nama pengguna yang sedang login
        $namaUser = Auth::user()->nama;
        $pesan = "Halo, saya $namaUser! ingin mengirimkan bukti transfer:\n\n ---------------- DETAIL PESANAN --------------- \n\n";
        
        foreach ($Transaksi_details as $Transaksi_detail) {
            $Barang = Barang::where('id', $Transaksi_detail->barang_id)->first();
            $namaBarang = $Barang->nama_barang;
            $jumlahBarang = $Transaksi_detail->jumlah . " barang";
            $totalHarga = $Transaksi->jumlah_harga;

            $pesan .= " Tanggal Pesan\t:\t$tanggalPesan\n Nama Barang\t:\t$namaBarang\n Jumlah\t\t:\t$jumlahBarang\n Total Harga\t:\t$totalHarga\n----------------------------------------------------\n";
            $Barang->update();
        }

        // Membuat link WhatsApp dengan pesan yang sesuai
        $linkWhatsApp = "https://api.whatsapp.com/send?phone=6287846184617&text=" . urlencode($pesan);

        // Mengarahkan pengguna ke link WhatsApp
        return redirect($linkWhatsApp);
    }
}

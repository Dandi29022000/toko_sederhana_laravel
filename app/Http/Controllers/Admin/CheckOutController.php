<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\User;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function transaksi(Request $request, $id)
    {
        $Barang = Barang::where('id', $id)->first();
        $tanggal = Carbon::now();

        //validasi apakah melebihi stok
    	if($request->jumlah_pesan > $Barang->satuan)
    	{
    		return redirect('/frontend-barang//detail'.$id);
    	}

        //Cek Validasi
        $cek_transaksi = Transaksi::where('user_id', Auth::user()->id)->where('status',0)->first();

        if(empty($cek_transaksi))
        {
            // Simpan ke database Transaksi
            $Transaksi = new Transaksi;
            $Transaksi->user_id = Auth::user()->id;
            $Transaksi->tanggal = $tanggal;
            $Transaksi->status = 0;
            $Transaksi->jumlah_harga = 0;
            $Transaksi->kode = mt_rand(100, 999);
            $Transaksi->save();
        }

        // Simpan ke database Transaksi detail
        $TransaksiBaru = Transaksi::where('user_id', Auth::user()->id)->where('status',0)->first();

        //Cek Transaksi Detail
        $cek_transaksi_detail = TransaksiDetail::where('barang_id', $Barang->id)->where('transaksi_id', $TransaksiBaru->id)->first();

        if(empty($cek_transaksi_detail))
        {
            $TransaksiDetail = new TransaksiDetail;
            $TransaksiDetail->barang_id = $Barang->id;
            $TransaksiDetail->transaksi_id = $TransaksiBaru->id;
            $TransaksiDetail->jumlah = $request->jumlah_pesan;
	    	$TransaksiDetail->jumlah_harga = $Barang->harga_jual * $request->jumlah_pesan;
            $TransaksiDetail->save();
        } 
        else
        {
            $Transaksi_detail = TransaksiDetail::where('barang_id', $Barang->id)->where('transaksi_id', $TransaksiBaru->id)->first();
            $Transaksi_detail->jumlah = $Transaksi_detail->jumlah + $request->jumlah_pesan;

    		//harga sekarang
    		$harga_transaksi_detail_baru = $Barang->harga_jual * $request->jumlah_pesan;
	    	$Transaksi_detail->jumlah_harga = $Transaksi_detail->jumlah_harga + $harga_transaksi_detail_baru;
	    	$Transaksi_detail->update();
        }

        //jumlah total
    	$Transaksi = Transaksi::where('user_id', Auth::user()->id)->where('status',0)->first();
    	$Transaksi->jumlah_harga = $Transaksi->jumlah_harga + $Barang->harga_jual * $request->jumlah_pesan;
    	$Transaksi->update();

        Alert::success('Success', 'Permainan Berhasil Masuk Keranjang!');
        return redirect()->route('frontend.barang');
    }

    public function check_out()
    {
        $Transaksi = Transaksi::where('user_id', Auth::user()->id)->where('status',0)->first();
 	    $Transaksi_details = [];
        if(!empty($Transaksi))
        {
            $Transaksi_details = TransaksiDetail::where('Transaksi_id', $Transaksi->id)->get();

        }
        
        return view('frontend/package/pesan/check-out', compact('Transaksi', 'Transaksi_details'));
    }

    public function delete($id)
    {
        $Transaksi_detail = TransaksiDetail::where('id', $id)->first();

        $Transaksi_detail->delete();

        Alert::error('Deleted', 'Transaksi Barang Berhasil Dihapus!');
        return redirect()->route('frontend.check-out');
    }

    public function konfirmasi()
    {
        $Transaksi = Transaksi::where('user_id', Auth::user()->id)->where('status',0)->first();
        $Transaksi_id = $Transaksi->id;
        $Transaksi->status = 1;
        $Transaksi->update();

        $Transaksi_details = TransaksiDetail::where('transaksi_id', $Transaksi_id)->get();
        foreach ($Transaksi_details as $Transaksi_detail) {
            $Barang = Barang::where('id', $Transaksi_detail->barang_id)->first();
            $Barang->satuan = $Barang->satuan - $Transaksi_detail->jumlah;
            $Barang->update();
        }

        Alert::success('Success', 'Berhasil Check Out Silahkan Lanjutkan Proses Pembayaran');
        return redirect('/frontend/order/detail/'.$Transaksi_id);
    }
}

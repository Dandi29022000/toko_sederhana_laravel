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

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Transaksi = Transaksi::where([
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('tanggal', 'LIKE', '%' . $term . '%')
                        ->orWhere('jumlah_harga', 'LIKE', '%' . $term . '%')
                        ->orWhere('status', 'LIKE', '%' . $term . '%')
                        ->orWhere('user_id', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->orderBy('id', 'asc')
            ->simplePaginate(10);

        return view('admin/package/transaksi/index', compact('Transaksi'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin/package/transaksi/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'user_id' => 'required',
        //     'tanggal' => 'required',
        //     'status' => 'required',
        //     'kode' => 'required',
        //     'jumlah_harga' => 'required'
        // ]);

        // Barang::create([
        //     'user_id' => $request->user_id,
        //     'tanggal' => $request->tanggal,
        //     'status' => $request->status,
        //     'kode' => $request->kode,
        //     'jumlah_harga' => $request->jumlah_harga
        // ]);

        // return redirect()->route('transaksi.index')
        // ->with('success', 'Data Transaksi Berhasil Ditambahkan');
    }


    public function show($id)
    {
        $transaksi = Transaksi::where('id', $id)->first();
    	$transaksi_details = TransaksiDetail::where('transaksi_id', $transaksi->id)->get();

        return view('admin/package/transaksi/detail', compact('transaksi', 'transaksi_details'));
    }


    public function edit($id)
    {
        $Transaksi = Transaksi::find($id);
        return view('admin/package/transaksi/update', compact('Transaksi'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'tanggal' => 'required',
            'status' => 'required',
            'kode' => 'required',
            'jumlah_harga' => 'required'
        ]);

        $update = Transaksi::find($id);
        $update->user_id = $request->get('user_id');
        $update->tanggal = $request->get('tanggal');
        $update->status = $request->get('status');
        $update->kode = $request->get('kode');
        $update->jumlah_harga = $request->get('jumlah_harga');

        $update->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        Alert::success('Success', 'Transaksi Berhasil Diupdate!');
        return redirect()->route('transaksi.index');
    }

    public function destroy($id)
    {
        // Fungsi eloquent untuk menghapus data
        $Transaksi_detail = TransaksiDetail::where('id', $id)->first();

        $Transaksi_detail->delete();
        return redirect('/admin/transaksi');

        Alert::error('Deleted', 'Transaksi Berhasil Dihapus!');
        return redirect()->route('frontend.check-out');
    }

    public function delete($id)
    {
        // Fungsi eloquent untuk menghapus data
        $Transaksi = Transaksi::where('id', $id)->first();

        $Transaksi->delete();

        return redirect('/admin/transaksi');

        Alert::error('Deleted', 'Transaksi Berhasil Dihapus!');
        return redirect()->route('frontend.check-out');
    }
}

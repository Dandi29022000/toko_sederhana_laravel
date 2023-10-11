<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Barang = Barang::where([
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('kode_barang', 'LIKE', '%' . $term . '%')
                        ->orWhere('nama_barang', 'LIKE', '%' . $term . '%')
                        ->orWhere('pabrik', 'LIKE', '%' . $term . '%')
                        ->orWhere('harga_jual', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->orderBy('id', 'asc')
            ->simplePaginate(10);

        return view('admin/package/barang/index', compact('Barang'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/package/barang/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'pabrik' => 'required',
            'satuan' => 'required',
            'harga_jual' => 'required',
            'gambar' => 'required'
        ]);

        $photo      = $request->file('gambar');
        $photo_name = time() . '_photo_' . $photo->getClientOriginalExtension();
        $photo_path = $photo->storeAs('fotoBarang', $photo_name, 'public');
        Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'pabrik' => $request->pabrik,
            'satuan' => $request->satuan,
            'harga_jual' => $request->harga_jual,
            'gambar' => $photo_path,
        ]);

        return redirect()->route('barang.index')
        ->with('success', 'Data Barang Berhasil Ditambahkan');
    }


    public function show($id)
    {
        // $Barang = Barang::find($id);
        // return view('admin/package/Barang/detail');
    }


    public function edit($id)
    {
        $Barang = Barang::find($id);
        // echo json_encode($Barang);die();
        return view('admin/package/barang/update', compact('Barang'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'pabrik' => 'required',
            'satuan' => 'required',
            'harga_jual' => 'required'
        ]);

        $update = Barang::find($id);
        $update->kode_barang = $request->get('kode_barang');
        $update->nama_barang = $request->get('nama_barang');
        $update->pabrik = $request->get('pabrik');
        $update->satuan = $request->get('satuan');
        $update->harga_jual = $request->get('harga_jual');

        if ($request->hasFile('gambar')) {
            $photo = $request->file('gambar');
            $photo_name = time() . '_photo_gambar.' . $photo->getClientOriginalExtension();
            $photo_path = $photo->storeAs('gambar', $photo_name, 'public');
            $update->gambar = $photo_path;
        }

        $update->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('barang.index')
            ->with('success', 'Barang Berhasil Diupdate');
    }

    public function destroy($id)
    {
        // Fungsi eloquent untuk menghapus data
        Barang::find($id)->delete();
        return redirect('/admin/barang')
            ->with('success', 'Data Barang Berhasil Dihapus');
    }
}

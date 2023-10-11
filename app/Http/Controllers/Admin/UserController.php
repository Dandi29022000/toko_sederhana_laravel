<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $User = User::where([
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('nama', 'LIKE', '%' . $term . '%')
                        ->orWhere('username', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->orderBy('id', 'asc')
            ->simplePaginate(10);

        return view('admin/package/user/index', compact('User'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/package/user/create');
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
            'nama' => 'required',
            'level' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'nama' => $request->nama,
            'level' => $request->level,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.index')
        ->with('success', 'Data User Berhasil Ditambahkan');
    }


    public function show($id)
    {
        // $User = User::find($id);
        // return view('admin/package/User/detail');
    }


    public function edit($id)
    {
        $User = User::find($id);
        // echo json_encode($User);die();
        return view('admin/package/user/update', compact('User'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'level' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        $update = User::find($id);
        $update->nama = $request->get('nama');
        $update->level = $request->get('level');
        $update->username = $request->get('username');
        $update->password = $request->get('password');

        $update->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('user.index')
            ->with('success', 'User Berhasil Diupdate');
    }

    public function destroy($id)
    {
        // Fungsi eloquent untuk menghapus data
        User::find($id)->delete();
        return redirect('/admin/user')
            ->with('success', 'Data User Berhasil Dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function postregister(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'level' => ['required', 'string', 'in:customer'],
            'username' => 'required|unique:users,username',
            'password' => 'required',
        ]);

        User::create([
            'nama' => $request->nama,
            'level' => 'customer',
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect('login')->with('success', 'Berhasil mendaftar, silahkan melakukan login!');
    }

    public function registerPage()
    {
        return view('auth.register');
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        $Slide = Slide::active()->orderBy('position', 'ASC')->get();
        // dd($request->all());
        if (Auth::attempt($request->only('username', 'password'))) {
            if (auth()->user()->level == 'admin') {
                return view('admin.package.dashboard')->with('success', 'Selamat datang ' . auth()->user()->name);
            } elseif (auth()->user()->level == 'customer') {
                return view('frontend.package.dashboard', compact('Slide'))->with('success', 'Selamat datang ' . auth()->user()->name);
            } else {
                return redirect('login');
            }
        }
        return redirect('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
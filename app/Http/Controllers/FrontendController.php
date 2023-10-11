<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Event;
use App\Models\Slide;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(){
        $Slide = Slide::active()->orderBy('position', 'ASC')->get();

        return view('frontend/package/dashboard', compact('Slide'));
    }

    public function about() {
        return view('frontend/package/about-us');
    }

    public function event() {
        $Event = Event::all();
        $Barang = Barang::all();
        $jumlahData = $Barang->count();

        return view('frontend/package/event', compact('Event','jumlahData'));
    }
    
    public function eventDetail($id)
    {
        $Event = Event::where('id', $id)->first();
        $Barang = Barang::all();
        $jumlahData = $Barang->count();

        return view('frontend/package/event-detail', compact('Event','jumlahData'));
    }

    public function barang(){
        $Barang = Barang::all();
        $jumlahData = $Barang->count();
       
        return view('frontend/package/barang', compact('Barang', 'jumlahData'));
    }

    public function show($id)
    {
        $Barang = Barang::where('id', $id)->first();
        return view('frontend/package/barang-detail', compact('Barang'));
    }
}

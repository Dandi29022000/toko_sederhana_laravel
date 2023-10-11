<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\TransaksiDetailController;
use App\Http\Controllers\Admin\CheckOutController;
use App\Http\Controllers\Admin\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Auth
Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::get('register', 'register')->name('register');
    Route::post('postlogin', 'postLogin')->name('postlogin');
    Route::post('postregister', 'postregister')->name('register.post');
    Route::get('logout', 'logout')->name('logout');
});

// ADMIN
Route::group(['middleware' => ['auth', 'CekLevel:admin']], function () {
    Route::get('/admin', [AdminController::class, 'index']);

    // DATA uSER
    Route::resource('/admin/user', UserController::class);

    // DATA BARANG
    Route::resource('/admin/barang', BarangController::class);

    // DATA TRANSAKSI
    Route::resource('/admin/transaksi', TransaksiController::class);
    Route::delete('/admin/transaksi/{id}', [TransaksiController::class, 'delete'])->name('transaksi.delete');

    // DATA TRANSAKSI DETAIL
    Route::resource('/admin/transaksi/detail', TransaksiDetailController::class);

    // DATA EVENT
    Route::resource('/admin/event', EventController::class);

    Route::resource('/admin/slides', \App\Http\Controllers\Admin\SlideController::class);
    Route::get('/admin/slides/{slideId}/up', [\App\Http\Controllers\Admin\SlideController::class, 'moveUp']);
    Route::get('/admin/slides/{slideId}/down', [\App\Http\Controllers\Admin\SlideController::class, 'moveDown']);
});

// TAMPILAN FRONTEND USER
Route::get('/frontend-dashboard', [FrontendController::class, 'index'])->name('frontend.dashboard');
Route::get('/frontend-about', [FrontendController::class, 'about'])->name('frontend.about');
Route::get('/frontend-event', [FrontendController::class, 'event'])->name('frontend.event');
Route::get('/frontend-event/detail{id}', [FrontendController::class, 'eventDetail'])->name('frontend.event-detail');

Route::get('/frontend-barang', [FrontendController::class, 'barang'])->name('frontend.barang');
Route::get('/frontend-barang/detail/{id}', [FrontendController::class, 'show'])->name('frontend.barang-detail');

Route::post('/frontend/transaksi/{id}', [CheckOutController::class, 'transaksi'])->name('frontend.transaksi');
Route::get('/frontend/check-out', [CheckOutController::class, 'check_out'])->name('frontend.check-out');
Route::delete('/frontend/check-out/{id}', [CheckOutController::class, 'delete'])->name('frontend.delete');
Route::get('/frontend/check-out/konfirmasi', [CheckOutController::class, 'konfirmasi'])->name('frontend.konfirmasi');

Route::get('/frontend/order', [OrderController::class, 'index'])->name('frontend.order');
Route::get('/frontend/order/detail/{id}', [OrderController::class, 'show'])->name('frontend.order-detail');
Route::get('/frontend/order/konfirmasi', [OrderController::class, 'konfirmasiWhatsApp'])->name('frontend.konfirmasiWhatsApp');
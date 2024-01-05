<?php

use Illuminate\Support\Facades\Route; // Import the missing class

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\PersediaanController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\StokController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::resource('akun', AkunController::class);
Route::post('/akun/update', [AkunController::class, 'update'])->name('akun.update');
Route::get('/akun/destroy/{id}', [AkunController::class, 'destroy'])->name('akun.destroy');
// End Route akun

Route::resource('barang', BarangController::class);
Route::post('/barang/update', [BarangController::class, 'update'])->name('barang.update');
Route::get('/barang/destroy/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
// End Route barang

Route::resource('produksi', ProduksiController::class);
Route::post('/produksi/update', [ProduksiController::class, 'update'])->name('produksi.update');
Route::get('/produksi/destroy/{id}', [ProduksiController::class, 'destroy'])->name('produksi.destroy');
// End Route produksi

Route::resource('stok', StokController::class);
Route::post('/stok/update', [StokController::class, 'update'])->name('stok.update');
Route::get('/stok/destroy/{id}', [StokController::class, 'destroy'])->name('stok.destroy');

Route::resource('persediaan', PersediaanController::class);
Route::get('/persediaan/detail/{id}', [PersediaanController::class, 'detail'])->name('persediaan.detail');
// End Route stok

require __DIR__ . '/auth.php';
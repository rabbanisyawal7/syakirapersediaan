<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AkunController;

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



Route::controller(AkunController::class)->group(function () {
    Route::get('/akun', 'index')->name('akun');
    Route::get('/akun/create', 'create')->name('akun.create');
    Route::post('/akun/store', 'store')->name('akun.store');
    Route::get('/akun/edit/{id}', 'edit')->name('akun.edit');
    Route::post('/akun/update', 'update')->name('akun.update');
    Route::get('/akun/destroy/{id}', 'destroy') -> name('akun.destroy');
});
// End Route akun

Route::controller(BarangController::class)->group(function () {
    Route::get('/barang', 'index')->name('barang');
    Route::get('/barang/create', 'create')->name('barang.create');
    Route::post('/barang/store', 'store')->name('barang.store');
    Route::get('/barang/edit/{id}', 'edit')->name('barang.edit');
    Route::post('/barang/update', 'update')->name('barang.update');
    Route::get('/barang/destroy/{id}', 'destroy') -> name('barang.destroy');
});
// End Route barang

require __DIR__.'/auth.php';

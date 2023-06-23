<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('home')->with('status');
});

Auth::routes();
Route::middleware(['auth'])->group(function(){

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/stock', [App\Http\Controllers\StockController::class, 'index'])->name('stock');
Route::get('/stock-create', [App\Http\Controllers\StockController::class, 'create'])->name('stock.create');
Route::post('/simpan-stock', [App\Http\Controllers\StockController::class, 'store'])->name('simpan.stock');
Route::get('edit-stock/{id}', [App\Http\Controllers\StockController::class, 'edit'])->name('stock.edit');
Route::post('/update-stock/{id}', [App\Http\Controllers\StockController::class, 'update'])->name('stock.update');
Route::get('hapus-stock/{id}', [App\Http\Controllers\StockController::class, 'destroy'])->name('stock.hapus');


//pegawai
Route::get('/pegawai', [App\Http\Controllers\PegawaiControl::class, 'index'])->name('pegawai');
Route::get('/pegawai-create', [App\Http\Controllers\PegawaiControl::class, 'create'])->name('pegawai.create');
Route::post('/simpan-pegawai', [App\Http\Controllers\PegawaiControl::class, 'store'])->name('simpan.pegawai');
Route::get('edit-pegawai/{id}', [App\Http\Controllers\PegawaiControl::class, 'edit'])->name('pegawai.edit');
Route::post('/update-pegawai/{id}', [App\Http\Controllers\PegawaiControl::class, 'update'])->name('pegawai.update');
Route::get('hapus-pegawai/{id}', [App\Http\Controllers\PegawaiControl::class, 'destroy'])->name('pegawai.hapus');

});

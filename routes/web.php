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
Route::get('/pegawai', [App\Http\Controllers\PegawaiController::class, 'index'])->name('pegawai');
Route::get('/pegawai-create', [App\Http\Controllers\PegawaiController::class, 'create'])->name('pegawai.create');
Route::post('/simpan-pegawai', [App\Http\Controllers\PegawaiController::class, 'store'])->name('simpan.pegawai');
Route::get('edit-pegawai/{id}', [App\Http\Controllers\PegawaiController::class, 'edit'])->name('pegawai.edit');
Route::post('/update-pegawai/{id}', [App\Http\Controllers\PegawaiController::class, 'update'])->name('pegawai.update');
Route::get('hapus-pegawai/{id}', [App\Http\Controllers\PegawaiController::class, 'destroy'])->name('pegawai.hapus');

//supplier routing
Route::get('/supplier', [App\Http\Controllers\SupplierController::class, 'index'])->name('supplier');
Route::get('/supplier-create', [App\Http\Controllers\SupplierController::class, 'create'])->name('supplier.create');
Route::post('/simpan-supplier', [App\Http\Controllers\SupplierController::class, 'store'])->name('simpan.supplier');
Route::get('edit-supplier/{id}', [App\Http\Controllers\SupplierController::class, 'edit'])->name('supplier.edit');
Route::post('/update-supplier/{id}', [App\Http\Controllers\SupplierController::class, 'update'])->name('supplier.update');
Route::get('hapus-supplier/{id}', [App\Http\Controllers\SupplierController::class, 'destroy'])->name('supplier.hapus');
Route::get('supplier-cetak', [App\Http\Controllers\SupplierController::class, 'cetak_pdf'])->name('cetak_supplier.pdf'); 


//perubahan harga

Route::get('/perubahan_harga', [App\Http\Controllers\Perubahan_hargaController::class, 'index'])->name('perubahan_harga');
Route::get('/perubahan_harga-create', [App\Http\Controllers\Perubahan_hargaController::class, 'create'])->name('perubahan_harga.create');
Route::get('edit-perubahan_harga/{id}', [App\Http\Controllers\Perubahan_hargaController::class, 'edit'])->name('perubahan_harga.edit');
Route::post('/simpan-perubahan_harga', [App\Http\Controllers\Perubahan_hargaController::class, 'store'])->name('simpan.perubahan_harga');
Route::post('/update-perubahan_harga/{id}', [App\Http\Controllers\Perubahan_hargaController::class, 'update'])->name('perubahan_harga.update');
Route::get('hapus-perubahan_harga/{id}', [App\Http\Controllers\Perubahan_hargaController::class, 'destroy'])->name('perubahan_harga.hapus');
Route::get('perubahan_harga-cetak', [App\Http\Controllers\Perubahan_hargaController::class, 'cetak_pdf'])->name('cetak_perubahan_harga.pdf');  
Route::get('/perubahan_harga/autocomplete', [App\Http\Controllers\Perubahan_hargaController::class, 'autocomplete'])->name('perubahan_harga.autocomplete');

});

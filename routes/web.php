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
Route::get('/Office', [App\Http\Controllers\HomeController::class, 'Office'])->name('Office');
Auth::routes();
Route::middleware(['auth'])->group(function(){

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/stock', [App\Http\Controllers\StockController::class, 'index'])->name('stock');
Route::get('/stock-create', [App\Http\Controllers\StockController::class, 'create'])->name('stock.create');
Route::post('/simpan-stock', [App\Http\Controllers\StockController::class, 'store'])->name('simpan.stock');
Route::get('edit-stock/{id}', [App\Http\Controllers\StockController::class, 'edit'])->name('stock.edit');
Route::post('/update-stock/{id}', [App\Http\Controllers\StockController::class, 'update'])->name('stock.update');
Route::get('hapus-stock/{id}', [App\Http\Controllers\StockController::class, 'destroy'])->name('stock.hapus');
Route::get('stock-cetak', [App\Http\Controllers\StockController::class, 'cetak_pdf'])->name('stock.cetak'); 


//pegawai
Route::get('/pegawai', [App\Http\Controllers\PegawaiController::class, 'index'])->name('pegawai');
Route::get('/pegawai-create', [App\Http\Controllers\PegawaiController::class, 'create'])->name('pegawai.create');
Route::post('/simpan-pegawai', [App\Http\Controllers\PegawaiController::class, 'store'])->name('simpan.pegawai');
Route::get('edit-pegawai/{id}', [App\Http\Controllers\PegawaiController::class, 'edit'])->name('pegawai.edit');
Route::post('/update-pegawai/{id}', [App\Http\Controllers\PegawaiController::class, 'update'])->name('pegawai.update');
Route::get('hapus-pegawai/{id}', [App\Http\Controllers\PegawaiController::class, 'destroy'])->name('pegawai.hapus');
Route::get('pegawai-cetak', [App\Http\Controllers\PegawaiController::class, 'cetak_pdf'])->name('cetak_pegawai.pdf');  
 
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
Route::get('perubahan_harga/preview', [App\Http\Controllers\Perubahan_hargaController::class, 'preview'])->name('perubahan_harga.preview'); 
Route::get('perubahan_harga/cetakPDF', [App\Http\Controllers\Perubahan_hargaController::class, 'cetakPDF'])->name('perubahan_harga.cetakPDF');  


//barang keluar routing
Route::get('/barang_keluar', [App\Http\Controllers\Barang_keluarController::class, 'index'])->name('barang_keluar');
Route::get('/Barang_keluar-create', [App\Http\Controllers\Barang_keluarController::class, 'create'])->name('barang_keluar.create');
Route::post('/simpan-barang_keluar', [App\Http\Controllers\Barang_keluarController::class, 'store'])->name('simpan.barang_keluar');
Route::get('edit-barang_keluar/{id}', [App\Http\Controllers\Barang_keluarController::class, 'edit'])->name('barang_keluar.edit');
Route::post('/update-barang_keluar/{id}', [App\Http\Controllers\Barang_keluarController::class, 'update'])->name('barang_keluar.update');
Route::get('hapus-barang_keluar/{id}', [App\Http\Controllers\Barang_keluarController::class,'destroy'])->name('barang_keluar.hapus');
Route::get('barang_keluar/preview', [App\Http\Controllers\Barang_keluarController::class, 'preview'])->name('barang_keluar.preview'); 
Route::get('barang_keluar/cetakPDF', [App\Http\Controllers\Barang_keluarController::class, 'cetakPDF'])->name('barang_keluar.cetakPDF');  



//barang masuk routing
Route::get('/barang_masuk', [App\Http\Controllers\Barang_masukController::class, 'index'])->name('barang_masuk');
Route::get('/Barang_masuk-create', [App\Http\Controllers\Barang_masukController::class, 'create'])->name('barang_masuk.create');
Route::post('/simpan-barang_masuk', [App\Http\Controllers\Barang_masukController::class, 'store'])->name('simpan.barang_masuk');
Route::get('edit-barang_masuk/{id}', [App\Http\Controllers\Barang_masukController::class, 'edit'])->name('barang_masuk.edit');
Route::post('/update-barang_masuk/{id}', [App\Http\Controllers\Barang_masukController::class, 'update'])->name('barang_masuk.update');
Route::get('hapus-barang_masuk/{id}', [App\Http\Controllers\Barang_masukController::class, 'destroy'])->name('barang_masuk.hapus');
Route::get('barang_masuk/preview', [App\Http\Controllers\Barang_masukController::class, 'preview'])->name('barang_masuk.preview'); 
Route::get('barang_masuk/cetakPDF', [App\Http\Controllers\Barang_masukController::class, 'cetakPDF'])->name('barang_masuk.cetakPDF');  

//pos
Route::get('/point-of-sales', [App\Http\Controllers\PenjualanController::class, 'index'])->name('point-of-sales');
Route::post('/point-of-sales/add-to-cart',[App\Http\Controllers\PenjualanController::class, 'addToCart'])->name('point-of-sales.add-to-cart');
Route::delete('/point-of-sales/remove-from-cart/{id}', [App\Http\Controllers\PenjualanController::class, 'removeItemFromCart'])->name('point-of-sales.remove-from-cart');
Route::post('/point-of-sales/checkout', [App\Http\Controllers\PenjualanController::class, 'checkout'])->name('point-of-sales.checkout');
Route::get('point-of-sales/printout/{noTransaksi}', [App\Http\Controllers\PenjualanController::class, 'printout'])->name('point-of-sales.printout');
Route::get('point-of-sales/edit', [App\Http\Controllers\PenjualanController::class, 'indexEdit'])->name('point-of-sales.indexEdit');
Route::get('point-of-sales/delete/{noTransaksi}', [App\Http\Controllers\PenjualanController::class, 'destroy'])->name('point-of-sales.delete');
Route::get('point-of-sales/pos_cetak_pdf/{noTransaksi}', [App\Http\Controllers\PenjualanController::class, 'cetak'])->name('pos.cetak');



Route::get('/perubahan_hargaJual', [App\Http\Controllers\Perubahan_hargaJualController::class, 'index'])->name('perubahan_hargaJual');
Route::get('/perubahan_hargaJual-create', [App\Http\Controllers\Perubahan_hargaJualController::class, 'create'])->name('perubahan_hargaJual.create');
Route::get('edit-perubahan_harga/{id}', [App\Http\Controllers\Perubahan_hargaJualController::class, 'edit'])->name('perubahan_harga.edit');
Route::post('/simpan-perubahan_hargaJual', [App\Http\Controllers\Perubahan_hargaJualController::class, 'store'])->name('simpan.perubahan_hargaJual');
Route::get('hapus-perubahan_harga/{id}', [App\Http\Controllers\Perubahan_hargaJualController::class, 'destroy'])->name('perubahan_harga.hapus');
Route::get('perubahan_hargaJual/preview', [App\Http\Controllers\Perubahan_hargaJualController::class, 'preview'])->name('perubahan_hargaJual.preview'); 
Route::get('perubahan_hargaJual/cetakPDF', [App\Http\Controllers\Perubahan_hargaJualController::class, 'cetakPDF'])->name('perubahan_hargaJual.cetakPDF');  

});

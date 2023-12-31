<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table        = 'stock';

    protected $fillable     = ['nomorbarang', 'namabarang', 'merek', 'satuan', 'harga', 'hargaJual', 'deskripsi', 'stok'];
    public $timestamps = true;

    public function barang_masuk() {
        return $this->hasOne(Barang_masuk::class, 'idbarang', 'id');
    }

    public function barang_keluar() {
        return $this->hasOne(Barang_keluar::class, 'idbarang', 'id');
    }
    public function perubahan_harga(){
        return $this->hasOne(Perubahan_harga::class, 'idbarang', 'id');
    }
    public function penjualan() {
        return $this->hasOne(Penjualan::class, 'idbarang', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang_keluar extends Model
{
    protected $table        = 'barang-keluar';
    protected $fillable     = ['idbarang', 'stok', 'tanggalkeluar', 'iduser', 'keterangan', 'token'];
    public $timestamps       = true;


    public function stock() {
        return $this->belongsTo(Stock::class, 'idbarang', 'id');
        }
        public function user() {
            return $this->belongsTo(User::class, 'iduser', 'id');
            }
    
}


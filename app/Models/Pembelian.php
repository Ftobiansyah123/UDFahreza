<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table        = 'pembelian';
    protected $fillable     = ['noPembelian', 'idsupplier', 'idbarang', 'iduser', 'hargaModal', 'stokMasuk'];
    public $timestamps       = true;

    public function stock() {
        return $this->belongsTo(Stock::class, 'idbarang', 'id');
        }
        
        public function user() {
            return $this->belongsTo(User::class, 'iduser', 'id');
        }
        public function supplier() {
            return $this->belongsTo(Supplier::class, 'idsupplier', 'id');
        }
       
            public function pengiriman() {
                return $this->hasOne(Pengiriman::class, 'datapengiriman', 'noPembelian');
                }
}



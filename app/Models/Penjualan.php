<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table        = 'penjualan';
    protected $fillable     = [ 'noTransaksi', 'idbarang', 'iduser', 'idmember', 'hargaAkhir', 'kuantitas'];
    public $timestamps       = true;
    public function stock() {
    return $this->belongsTo(Stock::class, 'idbarang', 'id');
    }
    
    public function user() {
        return $this->belongsTo(User::class, 'iduser', 'id');
    }
    public function pengiriman() {
        return $this->hasOne(Pengiriman::class, 'datapengiriman', 'noTransaksi');
        }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang_masuk extends Model
{
    protected $table        = 'barang-masuk';
    protected $fillable     = ['idsupplier', 'idbarang', 'stok',  'tanggalmasuk', 'iduser', 'keterangan'];
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
}

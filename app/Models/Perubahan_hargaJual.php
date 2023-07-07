<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perubahan_hargaJual extends Model
{
     protected $table ='perubahan-hargaJual';
    protected $fillable = ['idbarang', 'tanggal', 'harga_modal', 'harga_jual'];
    public $timestamps = true;

    public function stock() {
return $this->belongsTo(Stock::class, 'idbarang', 'id');

    }
}

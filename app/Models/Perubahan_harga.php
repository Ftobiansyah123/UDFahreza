<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perubahan_harga extends Model
{
    protected $table ='perubahan-harga';
    protected $fillable = ['idbarang', 'tanggal', 'harga_lama', 'harga_baru'];
    public $timestamps = true;

    public function stock() {
return $this->belongsTo(Stock::class, 'idbarang', 'id');

    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
   
        protected $table        = 'supplier';
        protected $fillable     = ['namasupplier', 'no_telepon', 'Alamat'];
        public $timestamps       = false;
    
    
        public function barang_masuk() {
            return $this->hasOne(Barang_masuk::class, 'idsupplier', 'id');
        }
        
}

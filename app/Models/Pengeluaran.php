<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
   
    protected $table        = 'pengeluaran';
    protected $fillable     = ['noPengeluaran', 'namapengeluaran', 'tanggalPengeluaran', 'biaya'];
    public $timestamps       = true;

}

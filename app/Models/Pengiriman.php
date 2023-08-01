<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    protected $table        = 'pengiriman';
    protected $fillable     = ['noResi', 'datapengiriman', 'tanggal', 'catatan'];
    public $timestamps       = true;
     public function penjualan() {
        return $this->belongsTo(Penjualan::class, 'datapengiriman', 'noTransaksi');
        }
        public function pembelian() {
            return $this->belongsTo(Pembelian::class, 'datapengiriman', 'noPembelian');
            }

}

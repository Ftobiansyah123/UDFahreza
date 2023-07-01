<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('noTransaksi');
            $table->unsignedInteger('idbarang');
            $table->date('tanggaljual');
            $table->unsignedInteger('iduser');
            $table->unsigneddecimal('hargaAkhir', 14, 2);
            $table->unsignedinteger('kuantitas')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
};

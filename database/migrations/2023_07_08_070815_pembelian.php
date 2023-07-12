<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
    {
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id();
            $table->string('noPembelian',220);
            $table->unsignedInteger('idbarang');
            $table->unsignedInteger('idsupplier');
            $table->unsignedInteger('iduser');
            $table->unsigneddecimal('hargaModal', 14);
            $table->unsignedinteger('stokMasuk')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembelian');
    }
};

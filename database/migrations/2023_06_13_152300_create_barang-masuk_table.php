<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('barang-masuk', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('idsupplier');
            $table->unsignedInteger('idbarang');
            $table->unsignedInteger('stok');
            $table->date('tanggalmasuk');
            $table->unsignedInteger('iduser');
            $table->text('keterangan');
			$table->string('token',220);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang-masuk');
    }
};

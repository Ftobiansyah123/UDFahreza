<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('barang-keluar', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('idbarang');
            $table->unsignedInteger('stok');
            $table->date('tanggalkeluar');
            $table->unsignedInteger('iduser');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang-keluar');
    }
};

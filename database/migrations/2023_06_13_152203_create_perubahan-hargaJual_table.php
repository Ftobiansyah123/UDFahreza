<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perubahan-hargaJual', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('idbarang');
            $table->date('tanggal');
            $table->unsignedInteger('harga_modal');
            $table->unsignedInteger('harga_jual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perubahan-harga');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perubahan-harga', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('idbarang');
            $table->date('tanggal');
            $table->unsignedInteger('harga_lama');
            $table->unsignedInteger('harga_baru');
		$table->string('token',220);
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

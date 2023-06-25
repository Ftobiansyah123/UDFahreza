<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void

    {    Schema::create('supplier', function (Blueprint $table) {
        $table->id();
        $table->string('namasupplier', 100);
        $table->string('no_telepon', 220);
        $table->string('Alamat', 220);
        $table->timestamps();
    });
}

/**
 * Reverse the migrations.
 */


public function down(): void
{
    Schema::dropIfExists('supplier');
}
};
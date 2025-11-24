<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_warkop', function (Blueprint $table) {
            $table->id();
            $table->string('nama_makanan');
            $table->integer('harga_makanan');
            $table->string('nama_minuman');
            $table->integer('harga_minuman');
            $table->string('gambar')->nullable();
            $table->integer('total_harga')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_warkop');
    }
};

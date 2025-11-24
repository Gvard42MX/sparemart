<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('keuangans', function (Blueprint $table) {
          $table->id();
            $table->date('tanggal'); // tanggal transaksi
            $table->string('keterangan'); // deskripsi transaksi
            $table->decimal('pemasukan', 15, 2)->default(0); // nilai pemasukan
            $table->decimal('pengeluaran', 15, 2)->default(0); // nilai pengeluaran
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keuangans');
    }
};

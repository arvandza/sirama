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
        Schema::create('riwayat', function (Blueprint $table) {
            $table->id();
            $table->string('subjek');
            $table->text('pesan');
            $table->date('tanggal');
            $table->enum('kategori', ['saran', 'kritik', 'keluhan']);
            $table->enum('tujuan', ['sarpras', 'akademik', 'pelayanan',]);
            $table->enum('status', ['proses', 'disetujui', 'ditolak']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat');
    }
};

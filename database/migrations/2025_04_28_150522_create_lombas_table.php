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
        Schema::create('lombas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('poster_url');
            $table->decimal('biaya_pendaftaran_individu', 15, 2);
            $table->decimal('biaya_pendaftaran_tim', 15, 2);
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->text('keterangan');
            $table->text('persyaratan');
            $table->text('jadwal_kegiatan');
            $table->text('hadiah');
            $table->integer('jumlah_like')->default(0);
            $table->integer('jumlah_view')->default(0);
            $table->integer('jenis_lomba');
            $table->foreignId('penyelenggara_id')->constrained('penyelenggaras')->onDelete('cascade');
            $table->foreignId('provinsi_id')->constrained('provinsis')->onDelete('cascade');
            $table->string('link_pendaftaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lombas');
    }
};

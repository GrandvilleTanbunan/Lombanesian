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
        Schema::create('mentor_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mentor_id');
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_selesai');
            $table->boolean('is_available')->default(true);
            $table->timestamps();

            // Tambahkan foreign key setelah semua kolom didefinisikan
            $table->foreign('mentor_id')
                  ->references('id')
                  ->on('mentors')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentor_schedules');
    }
};

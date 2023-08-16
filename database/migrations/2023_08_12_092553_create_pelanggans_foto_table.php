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
        Schema::create('pelanggan_fotos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggans_id')->constrained();
            $table->string('odp');
            $table->string('file');
            $table->text('catatan');
            $table->string('status')->nullable();
            $table->text('catatan_keseluruhan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan_fotos');
    }
};

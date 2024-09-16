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
        Schema::create('tierlist_tiers', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID en lugar de ID incremental
            $table->uuid('tierlist_id'); // Relación con tierlists usando UUID
            $table->foreign('tierlist_id')->references('id')->on('tierlists')->onDelete('cascade');

            $table->integer('posicion'); // Posición del tier (1, 2, 3, etc.)
            $table->string('nombre')->nullable(); // Nombre personalizado del tier (S, A, B, etc.)
            $table->string('color', 7)->nullable(); // Color en hexadecimal (#RRGGBB)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tierlist_tiers');
    }
};

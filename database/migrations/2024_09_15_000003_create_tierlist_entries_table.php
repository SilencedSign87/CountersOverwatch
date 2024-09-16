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
        Schema::create('tierlist_entries', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID en lugar de id incremental
            $table->uuid('tierlist_tier_id'); // Relación con tierlists usando UUID
            $table->foreign('tierlist_tier_id')->references('id')->on('tierlist_tiers')->onDelete('cascade');

            $table->uuid('hero_id'); // Relación con heroes usando UUID
            $table->foreign('hero_id')->references('id')->on('heroes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tierlist_entries');
    }
};

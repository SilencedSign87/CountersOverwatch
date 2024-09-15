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
            $table->id();
            $table->foreignId('tierlist_id')->constrained('tierlists')->onDelete('cascade');
            $table->foreignId('hero_id')->constrained('heroes')->onDelete('cascade');
            $table->integer('tier');
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

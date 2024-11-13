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
        Schema::create('hero_counter', function (Blueprint $table) {
            $table->uuid('hero_id'); // UUID para hero_id
            $table->uuid('counter_id'); // UUID para counter_id
            $table->timestamps();

            $table->foreign('hero_id')->references('id')->on('heroes')->onDelete('cascade');
            $table->foreign('counter_id')->references('id')->on('heroes')->onDelete('cascade');

            $table->unique(['hero_id', 'counter_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_counter');
    }
};

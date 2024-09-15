<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations, tabla pivote
     */
    public function up(): void
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID en lugar de id incremental
            $table->string('nombre');
            $table->text('nota')->nullable();
            $table->string('rol'); // 1 tanque, 2 dps, 3 supp
            $table->string('img_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};

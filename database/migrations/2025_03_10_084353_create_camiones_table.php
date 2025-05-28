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
        Schema::create('camiones', function (Blueprint $table) {
            $table->id();
            $table->string('marca', 50);
            $table->string('modelo', 50);
            $table->string('matricula', 20)->unique();
            $table->text('descripcion')->nullable();
            $table->decimal('gastoPorKm', 8, 2);
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('camiones');
    }
};

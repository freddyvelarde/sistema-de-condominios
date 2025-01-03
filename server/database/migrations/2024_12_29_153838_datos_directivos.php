<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {

        Schema::create('datos_directivos', function (Blueprint $table) {
            $table->id()->primary();
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->enum('cargo', ['presidente', 'tesorero']);
            $table->foreignId('id_usuario')->constrained('usuarios')->cascadeOnDelete();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_directivos');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('decisiones', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('descripcion');
            $table->enum('tipo', ['mantenimiento', 'evento', 'refaccion']);
            $table->date('fecha');
            $table->foreignId('id_usuario')->constrained('usuarios')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('decisiones');
    }
};

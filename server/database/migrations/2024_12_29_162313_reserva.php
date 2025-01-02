<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id() ->primary();
            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_final');
            $table->enum('estado', ['aceptado', 'rechazado']);
            $table->foreignId('id_area_comun')->constrained('areas_comunes');
            $table->foreignId('id_usuario')->constrained('usuarios');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};

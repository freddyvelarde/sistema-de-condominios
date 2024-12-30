<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('visitas_propiedades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_propiedad')->constrained('propiedades')->cascadeOnDelete();
            $table->foreignId('id_visitante')->constrained('visitantes')->cascadeOnDelete();
            $table->date('fecha');
            $table->time('hora_entrada');
            $table->time('hora_salida');
            $table->string('motivo');
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('visitas_propiedades');
    }
};

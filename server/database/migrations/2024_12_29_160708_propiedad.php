<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('propiedades', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('numero_propiedad')->unique();
            $table->string('piso');
            $table->integer('num_habitaciones');
            $table->enum('estado', ['ocupado', 'mantenimiento', 'desocupado']);
            $table->enum('tipo', ['vivienda', 'oficina', 'local']);
            $table->foreignId('id_copropietario')->constrained('copropietarios')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('propiedades');
    }
};

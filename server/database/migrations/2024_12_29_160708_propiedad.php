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
            $table->enum('estado', ['ocupado', 'mantenimiento', 'desocupado'])->default('desocupado')->nullable();
            $table->enum('tipo', ['vivienda', 'oficina', 'local'])->default('vivienda')->nullable();
            $table->foreignId('id_copropietario')->nullable()->constrained('copropietarios');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('propiedades');
    }
};

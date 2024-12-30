<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('control_areas_comunes', function (Blueprint $table) {
            $table->id()->primary();
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->double('costo');
            $table->string('descripcion');
            $table->enum('tipo', ['refaccion', 'mantenimiento', 'accidente']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('control_areas_comunes');
    }
};

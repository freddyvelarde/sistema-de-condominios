<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id()->primary();
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->enum('tipo', ['indefinido', 'temporal','por obra']);
            $table->double('sueldo_base');
            $table->enum('cargo', ['limpieza', 'seguridad']);
            $table->enum('estado', ['terminado', 'activo', 'suspendido']);
            $table->foreignId('id_empleado')->constrained('empleados')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};

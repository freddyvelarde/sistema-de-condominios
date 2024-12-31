<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id()->primary();
            $table->double('price');
            $table->enum('tipo', ['gasto', 'ingreso']);
            // $table->date('fecha');
            $table->enum('categoria', ['sueldo', 'mantenimiento', 'servicio', 'reserva', 'cuota']);
            // $table->enum('estado', ['pendiente', 'pagado']);
            $table->enum('metodo', ['qr', 'efectivo']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};

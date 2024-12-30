<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('pagos_empleados', function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId('id_empleado')->constrained('empleados')->cascadeOnDelete();
            $table->foreignId('id_pago')->constrained('pagos')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagos_empleados');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('pagos_reservas', function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId('id_copropietario')->constrained('copropietarios')->cascadeOnDelete();
            $table->foreignId('id_reserva')->constrained('reservas')->cascadeOnDelete();
            $table->foreignId('id_pago')->constrained('pagos')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagos_reservas');
    }
};
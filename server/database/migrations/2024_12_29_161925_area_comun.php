<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('areas_comunes', function (Blueprint $table) {
            $table->id() -> primary();
            $table->enum('tipo', ['cancha', 'parrilla', 'parqueo']);
            $table->enum('estado', ['habilitado', 'inhabilitado']);
            $table->double('costo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('areas_comunes');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('datos_usuarios', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('nombres');
            $table->string('apellido_pat');
            $table->string('apellido_mat');
            $table->string('email');
            $table->string('password');
            $table->string('num_telefono');
            $table->enum('rol', ['admin', 'copropietario', 'empleado','directivo']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_usuarios');
    }
};

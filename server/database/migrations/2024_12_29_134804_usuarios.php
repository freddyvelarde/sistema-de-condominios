<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('nombres');
            $table->string('apellido_pat')->nullable();
            $table->string('apellido_mat')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->string('num_telefono')->nullable();
            $table->enum('rol', ['admin', 'copropietario', 'empleado','directivo'])->default('copropietario');
            $table->string('ci')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};

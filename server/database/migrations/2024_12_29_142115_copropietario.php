<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('copropietarios', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('ci');
            $table->enum('estado', ['activo', 'inactivo']);
            $table->foreignId('id_usuario')->constrained('datos_usuarios')->cascadeOnDelete();
        });
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('copropietarios');
        Schema::dropIfExists('sessions');
    }
};
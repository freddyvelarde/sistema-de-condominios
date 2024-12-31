<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('propietarios', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('ci');
            $table->foreignId('id_usuario')->constrained('datos_usuarios')->cascadeOnDelete();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('propietarios');
    }
};

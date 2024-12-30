<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('visitantes', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('nombres');
            $table->string('apellido_pat');
            $table->string('apellido_mat');
            $table->string('ci');
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visitantes');
    }
};

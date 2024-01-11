<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plano_estudos_cursos', function (Blueprint $table) {
            $table->id();
            $table->date('data_concluido')->nullable();
            $table->date('aula_inicial');
            $table->date('aula_final');
            $table->string('duracao')->nullable();
            $table->date('data_final')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plano_estudos_cursos');
    }
};

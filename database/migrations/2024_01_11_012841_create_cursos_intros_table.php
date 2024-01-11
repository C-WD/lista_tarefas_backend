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
        Schema::create('cursos_intros', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo');
            $table->string('nome');
            $table->date('data_inicio');
            $table->date('data_fim')->nullable();
            $table->integer('tempo_diario')->nullable();
            $table->boolean('sabado_domingo')->default(false);
            $table->boolean('finalizar_aula')->default(false);
            $table->date('pausa_inicio')->nullable();
            $table->date('pausa_fim')->nullable();
            $table->integer('progresso')->default(0);
            $table->integer('duracao')->default(0);
            $table->integer('status');
            $table->string('link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos_intros');
    }
};

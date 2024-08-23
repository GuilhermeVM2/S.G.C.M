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
        Schema::create('horario_disponivels', function (Blueprint $table) {
            $table->id(); // Cria uma coluna de chave primária auto-incrementável
            $table->date('data'); // Cria uma coluna de data para 'data'
            $table->time('horaInicio'); // Cria uma coluna de tempo para 'horaInicio'
            $table->time('horaFim'); // Cria uma coluna de tempo para 'horaFim'
            $table->timestamps(); // Cria colunas 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horario_disponivels');
    }
};

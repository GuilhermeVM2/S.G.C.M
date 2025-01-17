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
        Schema::create('especialidades', function (Blueprint $table) {
            $table->id(); // Cria uma coluna de chave primária auto-incrementável
            $table->string('nome'); // Cria uma coluna de texto para 'nome'
            $table->text('descricao'); // Cria uma coluna de texto para 'descricao'
            $table->timestamps(); // Cria colunas 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('especialidades');
    }
};

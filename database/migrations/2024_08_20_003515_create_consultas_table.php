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
        Schema::create('consultas', function (Blueprint $table) {
            $table->id(); // Cria uma coluna de chave primária auto-incrementável
            $table->date('data'); // Cria uma coluna de tipo 'date' para 'data'
            $table->time('hora'); // Cria uma coluna de tipo 'time' para 'hora'
            $table->string('status'); // Cria uma coluna de tipo 'string' para 'status'
            $table->string('especialidade'); // Cria uma coluna de tipo 'string' para 'especialista'
            $table->timestamps(); // Cria colunas 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('faq_preguntas', function (Blueprint $table) {
            $table->id('id_pregunta'); // Llave primaria personalizada
            $table->string('pregunta'); // Campo para la pregunta
            $table->text('respuesta_pregunta'); // Campo para la respuesta
            $table->unsignedBigInteger('fk_categoria'); // Llave foránea
            $table->foreign('fk_categoria')->references('id')->on('categorias')->onDelete('cascade');

           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faq_preguntas');
    }
};

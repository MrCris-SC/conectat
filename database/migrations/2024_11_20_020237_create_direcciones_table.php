<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    /**
     * Ejecuta la migración.
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id('id_direccion');
            $table->unsignedBigInteger('fk_cliente'); // Relación con clientes
            $table->string('calle');
            $table->string('colonia');
            $table->string('localidad');
            $table->string('estado');
            $table->string('codigo_postal');
            $table->text('referencias')->nullable(); // Campo opcional
            $table->timestamps();

            // Clave foránea
            $table->foreign('fk_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Revierte la migración.
     */
    public function down()
    {
        Schema::dropIfExists('direcciones');
    }
}

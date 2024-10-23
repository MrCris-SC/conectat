<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('codigoPostal');
            $table->string('calle');
            $table->string('noExterior');
            $table->string('noInterior')->nullable();
            $table->string('ciudad');
            $table->string('alcaldia');
            $table->string('colonia');
            $table->string('entreCalle1')->nullable();
            $table->string('entreCalle2')->nullable();
            $table->string('manzana')->nullable();
            $table->string('lote')->nullable();
            $table->string('correo')->unique();
            $table->boolean('verificado')->default(false); // Indica si el precontrato fue verificado
            $table->foreignId('fk_paquete')->constrained('nombres_paquetes', 'id_nombre_paquete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}

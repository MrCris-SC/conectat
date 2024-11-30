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
    Schema::create('pagos', function (Blueprint $table) {
        $table->id('id_pago');
        $table->unsignedBigInteger('fk_contrato');
        $table->date('fecha_pago');
        $table->decimal('monto_acumulado_pagos', 10, 2);
        $table->enum('estado_pago', ['pendiente', 'pagado'])->default('pendiente');
        $table->timestamps();
        $table->date('fecha_inicio_mensualidad')->nullable()->after('estado_pago');
        $table->date('fecha_fin_mensualidad')->nullable()->after('fecha_inicio_mensualidad');

        $table->foreign('fk_contrato')->references('id_contrato')->on('contratos')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pagos', function (Blueprint $table) {
            $table->dropColumn(['fecha_inicio_mensualidad', 'fecha_fin_mensualidad']);
        });
    }
};

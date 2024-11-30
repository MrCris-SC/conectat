<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $table = 'pagos';

    protected $fillable = [
        'fk_contrato',
        'fecha_pago',
        'monto_acumulado_pagos',
        'estado_pago',
        'fecha_inicio_mensualidad', 
        'fecha_fin_mensualidad',
    ];

    public function contrato()
    {
        return $this->belongsTo(Contrato::class, 'fk_contrato');
    }
}

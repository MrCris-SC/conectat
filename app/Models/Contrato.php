<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;
    public $timestamps = false; // Desactiva los timestamps automáticos
    protected $primaryKey = 'id_contrato';
    public $incrementing = false; // Indica que no es un ID incremental
    protected $keyType = 'string';

    protected $fillable = [
        'id_contrato',
        'fecha_inicio_contrato',
        'fecha_fin_contrato',
        'total_meses_contrato',
        'estado',
        'monto_total_contrato',
        'monto_total_mensualidad',
        'fk_paquete',
        'fk_cliente',
    ];

    public static function generateUniqueContractId()
    {
        do {
            $id = str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT);
        } while (self::where('id_contrato', $id)->exists());

        return $id;
    }
}

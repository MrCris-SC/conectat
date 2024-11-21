<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    protected $table = 'direcciones'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'fk_cliente',
        'calle',
        'colonia',
        'localidad',
        'estado',
        'codigo_postal',
        'referencias',
    ];

    /**
     * Relación con el cliente (muchas direcciones pertenecen a un cliente).
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'fk_cliente', 'id_cliente');
    }
}

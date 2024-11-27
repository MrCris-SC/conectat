<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    protected $table = 'direcciones'; // Nombre de la tabla en la base de datos
    public $timestamps = false;
    protected $primaryKey = 'id_direccion';
    protected $fillable = [
        'codigo_postal',
        'localidad',
        'entidad_federativa',
        'colonia',
        'calle',
        'referencia_domicilio',
        'fk_cliente',
    ];

    /**
     * Relación con el cliente (muchas direcciones pertenecen a un cliente).
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'fk_cliente', 'id_cliente');
    }
    // En el modelo Direccion
    public function precontratos()
    {
        return $this->hasMany(Precontrato::class, 'fk_direccion');
    }


}

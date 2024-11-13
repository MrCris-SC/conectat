<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    use HasFactory;

    protected $table = 'direcciones';
    public $timestamps = false; // Desactiva los timestamps automáticos
    protected $primaryKey = 'id_direccion';
    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'codigo_postal',
        'localidad',
        'entidad_federativa',
        'colonia',
        'calle',
        'referencia_domicilio',
    ];
    public function precontratos()
    {
        return $this->hasMany(Precontrato::class, 'fk_direccion');
    }
}

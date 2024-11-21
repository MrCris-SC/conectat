<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NombrePaquete extends Model
{
    use HasFactory;

    // Especificar el nombre de la tabla si es diferente de la convención de Laravel
    protected $table = 'nombres_paquetes';

    // Especificar la clave primaria 
    protected $primaryKey = 'id_nombre_paquete';

    // Indicar que la clave primaria no es auto-incremental si es necesario
    public $incrementing = true;

    // Si la clave primaria no es de tipo entero, puedes especificarlo así:
    protected $keyType = 'int';

    public $timestamps = false;

    // Definir los campos que se pueden rellenar de manera masiva
    protected $fillable = [
        'nombre_paquete',
        'precio',
        'caracteristicas_paquete',
        'velocidad_paquete',
        'fk_promocion'
    ];

    // Definir la relación con la tabla promociones_paquetes (si es necesario)
    public function promocion()
    {
        return $this->belongsTo(PromocionPaquete::class, 'fk_promocion', 'id_promocion');
    }
    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'fk_paquete','id_nombre_paquete');
    }
    public function precontratos()
    {
        return $this->hasMany(Precontrato::class, 'fk_paquete', 'id_nombre_paquete');
    }
    

    
}

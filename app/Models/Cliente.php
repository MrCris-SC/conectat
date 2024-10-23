<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente'; // Define la clave primaria correctamente
    protected $fillable = [
        'nombre_completo', 'cp', 'municipio', 'direccion', 'correo_electronico', 'telefono','referencia_domicilio','fk_paquete', 
        // Incluir todos los campos del formulario
    ];

    public function nombre_paquete()
    {
        return $this->belongsTo(NombrePaquete::class, 'fk_paquete', 'id_nombre_paquete');
    }
}


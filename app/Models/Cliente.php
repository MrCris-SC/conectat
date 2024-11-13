<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente'; // Define la clave primaria correctamente
    protected $fillable = [
        'nombre_completo', 'correo_electronico', 'telefono',
        // Incluir todos los campos del formulario
    ];
    public function precontratos()
    {
        return $this->hasMany(Precontrato::class, 'fk_cliente');
    }
}


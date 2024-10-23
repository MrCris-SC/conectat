<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Administrador extends Authenticatable
{
    protected $table = 'administradores'; // Nombre de la tabla
    protected $primaryKey = 'id_admin'; // Llave primaria
    public $timestamps = false; // Si no usas timestamps

    protected $fillable = [
        'Nombre',
        'Correo_electronico',
        'Contraseña',
        'permisos',
        'fk_usuario',
    ];

    public function getAuthIdentifierName()
    {
        return 'Correo_electronico'; // Columna para el nombre de usuario
    }

    public function getAuthPassword()
    {
        return $this->Contraseña; // Columna de contraseña
    }
}

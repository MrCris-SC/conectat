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
        'nombre',
        'correo_electronico',
        'password',
        'permisos',
    ];

    public function getAuthIdentifierName()
    {
        return 'correo_electronico'; // Columna para el nombre de usuario en minúsculas
    }

    public function getAuthPassword()
    {
        return $this->password; // Columna de contraseña en minúsculas
    }
}

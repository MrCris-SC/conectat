<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministradorUpdate extends Model
{
    use HasFactory;
    protected $table = 'administradores'; // Asegúrate de que el nombre de la tabla sea correcto
    protected $primaryKey = 'id_admin'; // Asegúrate de que el campo de la clave primaria sea correcto
    protected $fillable = ['Nombre', 'Correo_electronico', 'Contraseña', 'permisos'];

}

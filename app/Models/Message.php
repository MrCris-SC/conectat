<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // Especificar el nombre de la tabla si es diferente de la convención de Laravel
    protected $table = 'mensajes';

     // Desactivar timestamps
     //public $timestamps = false;
    // Especificar la clave primaria 
    protected $primaryKey = 'id_mensaje';

    protected $fillable = [
        'nombre',
        'mensaje',
        'correo_mensaje'
    ];
}

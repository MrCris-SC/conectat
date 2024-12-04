<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class FaqPregunta extends Model
{
  

    // Tabla asociada al modelo
    protected $table = 'faq_preguntas';

    // Clave primaria
    protected $primaryKey = 'id_pregunta';

    // Indica que no se usa timestamps (created_at, updated_at)
    public $timestamps = false;

    // Campos permitidos para asignación masiva
    protected $fillable = [
        'pregunta',
        'respuesta_pregunta',
        'fk_categoria',
    ];

    
}

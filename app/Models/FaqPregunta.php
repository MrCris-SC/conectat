<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqPregunta extends Model
{
    use HasFactory;


    protected $table = 'faq_preguntas';

    protected $primaryKey = 'id_pregunta';
    protected $fillable = ['pregunta', 'respuesta_pregunta','fk_categoria'];
    public $timestamps = false;

}
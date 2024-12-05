<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model 
{
    use HasFactory;

    protected $table = 'tickets';
    protected $primaryKey = 'id_ticket';
    public $timestamps = false;

    protected $fillable = [
        'folio',
        'fk_contrato',
        'status',
        'fecha_reporte',
        'problema',
    ];

    
}
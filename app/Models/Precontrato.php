<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Precontrato extends Model
{
    use HasFactory;
    public $timestamps = false;
    // Nombre de la tabla en la base de datos
    protected $table = 'precontratos';

    // La clave primaria en la tabla
    protected $primaryKey = 'id_precontrato';

    // Si deseas que el campo 'id_precontrato' se auto-incremente, no es necesario definirlo ya que Laravel lo detecta automáticamente.
    // Si quieres especificar los campos que pueden ser llenados masivamente (fillable)
    protected $fillable = [
        'fk_cliente', 
        'fk_direccion', 
        'fk_paquete'
    ];

    // Relación con el modelo Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'fk_cliente');
    }

    // Relación con el modelo Domicilio (Dirección)
    public function direccion()
    {
        return $this->belongsTo(Domicilio::class, 'fk_direccion');
    }

    // Relación con el modelo Paquete
    public function paquete()
    {
        return $this->belongsTo(NombrePaquete::class, 'fk_paquete');
    }
}

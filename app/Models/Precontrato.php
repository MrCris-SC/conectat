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

   // En el modelo Precontrato.php

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'fk_cliente', 'id_cliente');
    }

    public function direccion()
    {
        return $this->belongsTo(Domicilio::class, 'fk_direccion', 'id_direccion');
    }

    public function paquete()
    {
        return $this->belongsTo(NombrePaquete::class, 'fk_paquete', 'id_nombre_paquete');
    }

    public function nombre_paquete()
    {
        return $this->belongsTo(NombrePaquete::class, 'fk_paquete');
    }


}

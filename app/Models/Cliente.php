<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente'; // Define la clave primaria correctamente
    protected $fillable = [
        'nombre_completo', 'correo_electronico', 'telefono','fk_paquete'
        // Incluir todos los campos del formulario
    ];
    public function precontratos()
    {
        return $this->hasMany(Precontrato::class, 'cliente_id'); // Define la relación entre cliente y precontrato
    }
    
    public function nombre_paquete()
    {
        return $this->belongsTo(NombrePaquete::class, 'fk_paquete');
    }
    public function domicilio()
    {
        return $this->hasOne(Domicilio::class, 'fk_cliente', 'id_cliente');
    }

}


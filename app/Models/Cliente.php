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
        return $this->hasMany(Precontrato::class, 'fk_cliente', 'id_cliente');
    }
    
    /*public function nombrepaquete()
    {
        return $this->belongsTo(NombrePaquete::class, 'fk_paquete', 'id_nombre_paquete');
    }*/
        public function nombrepaquete()
    {
        return $this->hasOneThrough(
            NombrePaquete::class, 
            Precontrato::class, 
            'fk_cliente',      // Foreign key en la tabla `precontratos`
            'id_nombre_paquete', // Foreign key en la tabla `nombres_paquetes`
            'id_cliente',      // Local key en la tabla `clientes`
            'fk_paquete'       // Local key en la tabla `precontratos`
        );
    }


    public function direcciones()
    {
    return $this->hasMany(Direccion::class, 'fk_cliente', 'id_cliente');
    }

    public function domicilio()   
    {
        return $this->hasOne(Domicilio::class, 'fk_cliente', 'id_cliente');    
    }

}


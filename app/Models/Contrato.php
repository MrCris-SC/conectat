<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;
    public $timestamps = false; // Desactiva los timestamps automáticos
    protected $primaryKey = 'id_contrato';
    public $incrementing = false; // Indica que no es un ID incremental
    protected $keyType = 'string';

    protected $fillable = [
        'id_contrato',
        'fecha_inicio_contrato',
        'fecha_fin_contrato',
        'total_meses_contrato',
        'estado',
        'monto_total_contrato',
        'monto_total_mensualidad',
        'fk_precontrato',
        
    ];

    public static function generateUniqueContractId()
    {
        do {
            $id = str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT);
        } while (self::where('id_contrato', $id)->exists());

        return $id;
    }

   // Relación con el Precontrato
   public function precontrato()
   {
       return $this->belongsTo(Precontrato::class, 'fk_precontrato', 'id_precontrato');
   }
   
   public function direccion()
   {
        return $this->belongsTo(Domicilio::class, 'fk_direccion', 'id_direccion');
   }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'fk_cliente', 'id_cliente');
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'fk_contrato'); // fk_contrato es la clave foránea en la tabla 'pagos'
    }
   /*public function cliente()
   {
       return $this->hasOneThrough(Cliente::class, Precontrato::class, 'fk_precontrato', 'id_cliente', 'fk_precontrato', 'fk_cliente');
   }*/
   

   /* // Relación con el Cliente a través de Precontrato
    public function cliente()
    {
        return $this->belongsToThrough(Cliente::class, Precontrato::class);
    }

    // Relación con el Paquete a través de Precontrato
    public function paquete()
    {
        return $this->belongsToThrough(NombrePaquete::class, Precontrato::class);
    }*/

}

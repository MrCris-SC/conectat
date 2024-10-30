<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\Cliente;
use Carbon\Carbon;

class ContratoController extends Controller
{
    public function crearContrato($id_cliente)
    {
        // Obtén el cliente y su paquete
        $cliente = Cliente::findOrFail($id_cliente);
        
        // Obtén el fk_paquete desde el cliente
        $fk_paquete = $cliente->fk_paquete;

        // Define otros valores necesarios para el contrato
        $fecha_inicio = Carbon::now();
        $fecha_fin = $fecha_inicio->copy()->addYear(); // Fecha de finalización (por ejemplo, un año después)
        $estado = 'activo'; // Estado inicial del contrato
        $monto = 1000; // Ajusta el monto según tus necesidades

        // Inserta el nuevo contrato
        Contrato::create([
            'id_contrato' => Contrato::generateUniqueContractId(),
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin,
            'estado' => $estado,
            'monto' => $monto,
            'fk_paquete' => $fk_paquete,
            'fk_cliente' => $id_cliente,
        ]);

        return redirect()->back()->with('success', 'Contrato creado con éxito.');
    }
}

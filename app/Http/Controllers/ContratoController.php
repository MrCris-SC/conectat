<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\Cliente;
use Carbon\Carbon;
use App\Models\NombrePaquete;
use App\Models\Precontrato;
use App\Models\Domicilio;

class ContratoController extends Controller
{    

    public function crearContrato($id_cliente)
    {
        // Obtén el cliente y verifica que tenga el fk_paquete
       // $cliente = Cliente::findOrFail($id_cliente);
        //$cliente = Precontrato::with(['cliente', 'direccion', 'paquete'])->get();
        $cliente = Cliente::with(['domicilio', 'nombrePaquete'])->findOrFail($id_cliente);

        //$clientes = Precontrato::with(['cliente', 'direccion', 'paquete'])->get();
        if ($cliente->es_cliente == 1){
            return redirect()->back()->withErrors('Este cliente ya tiene un contrato asignado');
        }
        
        if (!$cliente->fk_paquete) {
            return redirect()->back()->withErrors('El cliente no tiene un paquete asignado.');
        }
        
        // Obtén el fk_paquete desde el cliente
       // $fk_paquete = $cliente->fk_paquete;

        // Obtener el precio del paquete desde la tabla `nombres_paquetes`
        //$paquete = NombrePaquete::find($fk_paquete);
        $paquete = $cliente->nombrePaquete;

        if (!$paquete) {
            return redirect()->back()->withErrors('No se encontró el paquete.');
        }

        $monto = $paquete->precio;

        // Define otros valores necesarios para el contrato
        $fecha_inicio = Carbon::now();
        $fecha_fin = $fecha_inicio->copy()->addYear(); // Fecha de finalización (un año después)
        $estado = 'activo'; // Estado inicial del contrato

        // Inserta el nuevo contrato
        Contrato::create([
            'id_contrato' => Contrato::generateUniqueContractId(),
            'fecha_inicio_contrato' => $fecha_inicio,
            'fecha_fin_contrato' => $fecha_fin,
            'total_meses_contrato' => 12,
            'estado' => $estado,
            'monto_total_contrato' => 500,
            'monto_total_mensualidad' => $monto,
            'fk_paquete' => $paquete->id_nombre_paquete,
            'fk_cliente' => $cliente->id_cliente,
            //'fk_paquete' => $fk_paquete,
            //'fk_cliente' => $id_cliente,
        ]);
       

        $cliente->es_cliente = 1;
        $cliente->save();
        
        return response()->json(['message' => 'Contrato creado con éxito'], 200);

        return redirect()->back()->with('success', 'Contrato creado con éxito.');
    }



    public function mostrarContratos()
    {
          // Obtiene todos los contratos
    $contratos = Contrato::all();
        return view('contratosVista', compact('contratos'));
    }
}

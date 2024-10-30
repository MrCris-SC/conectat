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
        // Obtener el cliente
        $cliente = Cliente::findOrFail($id_cliente);
    
        // Obtener el fk_paquete del cliente
        $fk_paquete = $cliente->fk_paquete;
    
        // Obtener el precio del paquete desde la tabla `nombres_paquetes`
        $paquete = NombrePaquete::where('id', $fk_paquete)->firstOrFail();
        $monto = $paquete->precio;
    
        // Definir otros valores del contrato
        $fecha_inicio = Carbon::now();
        $fecha_fin = $fecha_inicio->copy()->addYear(); // Fecha de finalización un año después
        $estado = 'activo'; // Estado inicial del contrato
    
        // Crear y guardar el contrato en la base de datos
        $contrato = new Contrato();
        $contrato->fecha_inicio = $fecha_inicio;
        $contrato->fecha_fin = $fecha_fin;
        $contrato->estado = $estado;
        $contrato->monto = $monto; // Monto obtenido de `nombres_paquetes`
        $contrato->fk_paquete = $fk_paquete;
        $contrato->fk_cliente = $cliente->id_cliente;
        $contrato->save();
    
        return redirect()->back()->with('success', 'Contrato creado exitosamente.');
    }

    public function mostrarContratos()
    {
       
          // Obtiene todos los contratos
    $contratos = Contrato::all();
       
       
        return view('contratosVista', compact('contratos'));
    }
}

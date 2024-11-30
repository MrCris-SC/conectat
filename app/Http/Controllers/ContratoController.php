<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\Cliente;
use Carbon\Carbon;
use App\Models\NombrePaquete;
use App\Models\Precontrato;
use App\Models\Domicilio;
use App\Models\Message;
use App\Models\Pago;
use PDF;
use Illuminate\Support\Facades\Log;


class ContratoController extends Controller
{    

        public function crearContrato(Request $request,$id_cliente)
        {
            try {
                $validatedData = $request->validate([
                    'fecha_inicio' => 'required|date',
                    'fecha_fin' => 'required|date',
                    'id_precontrato' => 'required|exists:precontratos,id_precontrato',
                ]);

                // Obtén el precontrato específico por el ID del cliente
                $precontrato = Precontrato::with(['cliente', 'direccion', 'paquete'])
                    ->where('fk_cliente', $id_cliente)
                    ->first();
        
                if (!$precontrato) {
                    return response()->json([
                        'success' => false,
                        'message' => 'El precontrato no fue encontrado.'
                    ], 404);
                }
                // Verificar si el precontrato ya tiene un contrato asociado
                $precontrato = PreContrato::find($request->id_precontrato);

                if ($precontrato->contrato) { // Suponiendo que la relación en PreContrato es 'contrato'
                    return response()->json([
                        'success' => false,
                        'message' => 'Este precontrato ya tiene un contrato asociado.'.$precontrato->id_precontrato
                    ]);
                }
        
                        // Verificar si ya existe un contrato asociado al precontrato
                /*$contratoExistente = Contrato::where('fk_precontrato', $precontrato->id_precontrato)
                ->first(); // Verificamos solo si el precontrato está asociado

                if ($contratoExistente) {
                    return response()->json([
                         'success' => false,
                        'message' => 'Este precontrato ya tiene un contrato asociado.'
                    ], 400);
                }*/

                // Verificar que el precontrato tenga un paquete asignado
                if (!$precontrato->fk_paquete) {
                    return response()->json([
                        'success' => false,
                        'message' => 'El cliente no tiene un paquete asignado.'
                    ], 404);
                }
        
                $paquete = $precontrato->paquete;
        
                if (!$paquete) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Paquete no encontrado.'
                    ]);
                }

                // Datos de fecha de inicio y fin recibidos del frontend
                $fecha_inicio = trim($request->input('fecha_inicio'));
                $fecha_fin = trim($request->input('fecha_fin'));

    
                
                // Validar que las fechas estén presentes
                if (!$fecha_inicio || !$fecha_fin) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Las fechas de inicio y fin son requeridas.'
                    ], 400);
                }

                // Convertir las fechas a un formato que Carbon pueda manejar (DD/MM/YYYY a YYYY-MM-DD)
                try {
                    // Asegúrate de convertir las fechas al formato correcto (YYYY-MM-DD)
                    $fecha_inicio = Carbon::createFromFormat('Y-m-d', $fecha_inicio);
                    

                } catch (\Exception $e) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Formato de fecha incorrecto. El formato esperado es DD/MM/YYYY.'
                    ], 400);
                }

                // Si las fechas no son válidas o la fecha de inicio es posterior a la de fin, devolver un error
                if ($fecha_inicio->greaterThanOrEqualTo($fecha_fin)) {
                    return response()->json([
                        'success' => false,
                        'message' => 'La fecha de inicio no puede ser igual o posterior a la fecha de fin.'
                    ], 400);
                }
        
                // Define los valores del contrato
                $monto = $paquete->precio;
                //$fecha_inicio = Carbon::now();
                //$fecha_fin = $fecha_inicio->copy()->addYear();
                $estado = 'pendiente';
        
                // Datos para crear el contrato
                $datosContrato = [
                    'id_contrato' => Contrato::generateUniqueContractId(),
                    'fecha_inicio_contrato' => $fecha_inicio,
                    'fecha_fin_contrato' => $fecha_fin,
                    'total_meses_contrato' => $fecha_inicio->diffInMonths($fecha_fin), // Calcula el número de meses entre las dos fechas
                    'estado' => $estado,
                    'monto_total_contrato' => $monto * $fecha_inicio->diffInMonths($fecha_fin), // Total por la duración del contrato
                    'monto_total_mensualidad' => $monto,
                    'fk_precontrato' => $precontrato->id_precontrato,
                ];
        
                // Crear el contrato
                Contrato::create($datosContrato);
        
                // Marcar al cliente como activo
                $cliente = $precontrato->cliente;
                $cliente->es_cliente = 1;
                $cliente->save();
        
                return response()->json([
                    'success' => true,
                    'message' => 'Contrato creado con éxito',
                    'id_cliente' => $id_cliente
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al crear el contrato: ' . $e->getMessage()
                ]);
            }
        }
    
    

    public function generarContratoPDF($id_precontrato)
    {
       // Obtener el precontrato con sus relaciones necesarias
        $precontrato = Precontrato::with(['cliente', 'paquete', 'direccion'])
        ->where('id_precontrato', $id_precontrato)
        ->first();
    
         // Verificar si se encontró el precontrato y que tenga un paquete asociado
         if (!$precontrato || !$precontrato->paquete) {
            //Log::error('Precontrato o paquete no encontrado: ' . $id_precontrato);
            return redirect()->route('clientes')->withErrors('Precontrato, paquete o cliente no encontrado.');
        }
        

        // Generar el PDF con los datos obtenidos
        $pdf = PDF::loadView('pdf.contrato', [
            'cliente' => $precontrato->cliente,
            'paquete' => $precontrato->paquete,
            'direccion' => $precontrato->direccion,
        ]);
    
        return $pdf->download('contrato_cliente_' . $precontrato->cliente->id_cliente . '.pdf');

        //return $pdf->download('contrato_cliente_' . $precontrato->cliente->id_cliente . '.pdf');
    }
    


    public function mostrarContratos()
    {
        // Cargar contratos con la relación precontrato, cliente y paquete
        $contratos = Contrato::with('precontrato.cliente', 'precontrato.paquete','precontrato.direccion')->get();
    
        return view('contratosVista', compact('contratos'));
    }

   /* public function verificarContrato(Request $request, $id_precontrato)
    {
        try {
            // Verificar si el precontrato existe
            $precontrato = PreContrato::find($id_precontrato);        
            if (!$precontrato) {
                return response()->json([
                    'success' => false,
                    'message' => 'Precontrato no encontrado.'
                ]);
            }
    
            // Verificar si existe un contrato asociado con el id_precontrato
            $contratoExistente = \DB::table('contratos')
                ->where('fk_precontrato', $id_precontrato)
                ->exists();
    
            // Si ya existe un contrato asociado, retornamos mensaje de error
            if ($contratoExistente) {
                return response()->json([
                    'verificarContrato' => false,  // Aquí usamos 'false' porque ya existe un contrato asociado
                    'message' => 'Este precontrato ya tiene un contrato asociado.'
                ]);
            }
    
            // Si no existe un contrato, permitimos la creación de uno nuevo
            return response()->json([
                'verificarContrato' => true,  // Aquí usamos 'true' porque el contrato no existe, se puede crear uno nuevo
                'message' => 'Este precontrato no tiene un contrato asociado, puede proceder a crear uno.'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Ocurrió un error: ' . $e->getMessage()
            ], 500);
        }
    }
    */

    public function show($id)
{
    // Obtén el contrato por ID
    $contrato = Contrato::findOrFail($id);

    // Obtén los 5 mensajes más recientes
    $mensajes = Message::latest()->take(5)->get();

    // Obtén los pagos relacionados con el contrato
    $pagos = Pago::where('fk_contrato', $id)->get();

    // Pasar el contrato, los mensajes y los pagos a la vista
    return view('gestionContratos', compact('contrato', 'mensajes', 'pagos'));
}

    public function updateEstado(Request $request, $id)
{
    // Validar el estado recibido
    $request->validate([
        'estado' => 'required|in:pendiente,activo,inactivo',
    ]);
    

    // Obtener el contrato por ID
    $contrato = Contrato::findOrFail($id);

    // Actualizar el estado del contrato
    $contrato->estado = $request->estado;
    $contrato->save();

    // Generar el calendario de pagos si el estado es "activo"
    if ($contrato->estado === 'activo') {
        $this->crearCalendarioPagos($contrato);
    }
    if ($contrato->estado == 'inactivo') {
        // Eliminar los pagos relacionados con este contrato
        Pago::where('fk_contrato', $contrato->id_contrato)->delete();
    }
    $contrato->save();



    // Redirigir de vuelta con un mensaje de éxito
    return redirect()->route('gestionContrato.show', $contrato->id_contrato)
                    ->with('success', 'Estado del contrato actualizado con éxito.');
}

private function crearCalendarioPagos(Contrato $contrato)
{
    $fechaPago = Carbon::parse($contrato->fecha_inicio_contrato); 
    $montoMensual = $contrato->monto_total_mensualidad;

    for ($i = 0; $i < $contrato->total_meses_contrato; $i++) {
        // Crear cada pago
       Pago::create([
        'fk_contrato' => $contrato->id_contrato,
        'fecha_pago' => $fechaPago->format('Y-m-d'),
        'monto_acumulado_pagos' => $montoMensual,
        'fecha_inicio_mensualidad' => $fechaPago->format('Y-m-d'), // Igual a la fecha de pago
        'fecha_fin_mensualidad' => $fechaPago->copy()->endOfMonth()->format('Y-m-d'), // Fin del mes
        'estado_pago' => 'pendiente', // Los pagos inician como "pendiente"
            
            
        ]);

        // Avanzar al siguiente mes
        $fechaPago = $fechaPago->copy()->addMonth();

    }
}
public function mostrarCalendarioPagos($id_contrato)
{
    $pagos = Pago::where('fk_contrato', $id_contrato)->get();

    return view('pagos', compact('pagos'));
}


    
}


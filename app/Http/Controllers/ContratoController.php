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
use PDF;

class ContratoController extends Controller
{    

        public function crearContrato(Request $request,$id_cliente)
        {
            try {
                // Verificar si el cliente tiene direcciones registradas
                $domicilios = Domicilio::where('fk_cliente', $id_cliente)->get();

            
        
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
        
                // Verificar si la dirección del precontrato ya tiene un contrato
            /* $domicilio = $precontrato->direccion;
                if (!$domicilio) {
                    return response()->json([
                        'success' => false,
                        'message' => 'La dirección asociada al precontrato no existe.'
                    ]);
                }*/
        
                // Verificar si ya existe un contrato para la dirección asociada al precontrato
                $precontrato1 = $precontrato->id_precontrato; // Dirección asociada al precontrato
                if ($precontrato1) {
                    $cliente = Cliente::find($id_cliente);
                    $contratoExistente = Contrato::where('fk_precontrato', $precontrato1)
                        
                        ->first();

                    /*$contratoExistente = Contrato::whereHas('precontrato', function ($query) use ($id_cliente, $direccion) {
                        $query->where ('fk_cliente', $id_cliente)
                            ->where ('fk_direccion', $direccion->id_direccion);
                    })->exists();*/

                    if ($contratoExistente) {
                        return response()->json([
                            'success' => false,
                            'message' => 'Ya existe un contrato con este id: '.$precontrato->id_precontrato.' '.' Direccion: ' . $direccion->calle . ' ' . $direccion->numero . ' asociado a este cliente.'
                        ], 400);
                    }
                }
                    
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
    
    

    public function generarContratoPDF($id_cliente)
    {
        // Obtener el precontrato con sus relaciones
        $precontrato = Precontrato::with(['cliente', 'paquete'])
            ->where('fk_cliente', $id_cliente)
            ->first();
    
        if (!$precontrato || !$precontrato->paquete) {
            return redirect()->route('clientes')->withErrors('Paquete o cliente no encontrado.');
        }
    
        $pdf = PDF::loadView('pdf.contrato', [
            'cliente' => $precontrato->cliente,
            'paquete' => $precontrato->paquete,
        ]);
    
        return $pdf->download('contrato_cliente_' . $precontrato->cliente->id_cliente . '.pdf');
    }
    


    public function mostrarContratos()
    {
        // Cargar contratos con la relación precontrato, cliente y paquete
        $contratos = Contrato::with('precontrato.cliente', 'precontrato.paquete')->get();
    
        return view('contratosVista', compact('contratos'));
    }


    public function verificarContratoYDireccion($id_cliente)
    {
        try {
            // Lógica para verificar contrato y dirección
            $cliente = Cliente::find($id_cliente);
            $precontrato = PreContrato::where('id_cliente', $id_cliente)->first(); // Obtén el precontrato del cliente.
            if (!$precontrato) {
                return response()->json(['error' => 'Contrato no encontrado'], 404);
            }
            // Continuar con el flujo si todo está bien
            return response()->json($contrato);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ocurrió un error: ' . $e->getMessage()], 500);
        }
    }

<<<<<<< HEAD
=======
    
>>>>>>> ba80ab19a1946ea5c00f1dd85b21dea9013a420b

    public function show($id)
    {
        // Obtén el contrato por ID
        $contrato = Contrato::findOrFail($id);

        // Obtén los 5 mensajes más recientes
        $mensajes = Message::latest()->take(5)->get();

        // Pasar el contrato y los mensajes a la vista
        return view('gestionContratos', compact('contrato', 'mensajes'));
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

        // Redirigir de vuelta a la página de gestión del contrato con un mensaje de éxito
        return redirect()->route('gestionContrato.show', $contrato->id_contrato)
                        ->with('success', 'Estado del contrato actualizado con éxito.');
    }

    
}


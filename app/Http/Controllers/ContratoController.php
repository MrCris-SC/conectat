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
    public function crearContrato($id_cliente)
    {
        try {
            //dd($id_cliente);
            // Obtén un precontrato específico por el ID del cliente
            $precontrato = Precontrato::with(['cliente', 'direccion', 'paquete'])
                ->where('fk_cliente', $id_cliente)
                ->first();

            if (!$precontrato) {
                return redirect()->back()->withErrors('El precontrato no fue encontrado.');
            }

            $cliente = $precontrato->cliente;

            if (!$cliente) {
                return redirect()->back()->withErrors('Cliente no encontrado.');
            }

            if ($cliente->es_cliente == 1) {
                return redirect()->back()->withErrors('Este cliente ya tiene un contrato asignado.');
            }

            if (!$cliente->fk_paquete) {
                return redirect()->back()->withErrors('El cliente no tiene un paquete asignado.');
            }

            $paquete = $precontrato->paquete;

            if (!$paquete) {
                return redirect()->back()->withErrors('El paquete no fue encontrado.');
            }

            $monto = $paquete->precio;

            // Define los valores del contrato
            $fecha_inicio = Carbon::now();
            $fecha_fin = $fecha_inicio->copy()->addYear();
            $estado = 'pendiente';

            // Datos que serán enviados al modelo
            $datosContrato = [
                'id_contrato' => Contrato::generateUniqueContractId(),
                'fecha_inicio_contrato' => $fecha_inicio,
                'fecha_fin_contrato' => $fecha_fin,
                'total_meses_contrato' => 12,
                'estado' => $estado,
                'monto_total_contrato' => 500, // Cambiar si es necesario
                'monto_total_mensualidad' => $monto,
                'fk_precontrato' => $precontrato->id_precontrato,
                
            ];
            //dd($datosContrato);
            Contrato::create($datosContrato);
            $cliente->es_cliente = 1;
            $cliente->save();

        // $this->generarContratoPDF($id_cliente);
        return response()->json([
                'success' => true,
                'message' => 'Contrato creado con éxito',
                'id_cliente' => $id_cliente
            ]);
        } catch (\Exception $e) {
            // Si ocurre un error, devuelve una respuesta de error en JSON
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el contrato: ' . $e->getMessage()
            ]);
        }
    
       
      // return redirect()->route('preContrato');

       //return redirect()->back()->with('success', 'Contrato creado con éxito.');
    }

    public function generarContratoPDF($id_cliente)
    {
        // Obtener el cliente con su paquete relacionado
        $cliente = Cliente::with('nombrePaquete')->find($id_cliente);
        

        if (!$cliente) {
            return redirect()->route('clientes')->withErrors('Cliente no encontrado.');
        }

        // Generar el PDF con los datos del cliente
        $pdf = PDF::loadView('pdf.contrato', ['cliente' => $cliente]);

        // Descargar el archivo PDF
        return $pdf->download('contrato_cliente_' . $cliente->id_cliente . '.pdf');
       
    }


   /* public function mostrarContratos()
    {
   // Obtiene todos los contratos
    $contratos = Contrato::all();
        return view('contratosVista', compact('contratos'));
    }*/

    public function mostrarContratos()
    {
        // Cargar contratos con la relación precontrato, cliente y paquete
        $contratos = Contrato::with('precontrato.cliente', 'precontrato.paquete')->get();
    
        return view('contratosVista', compact('contratos'));
    }

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
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\Cliente;
use Carbon\Carbon;
use App\Models\NombrePaquete;
use App\Models\Precontrato;
use App\Models\Domicilio;
use PDF;

class ContratoController extends Controller
{    
    public function crearContrato($id_cliente)
    {
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
        $estado = 'activo';

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
           'fk_paquete' => $paquete->id_nombre_paquete,
            'fk_cliente' => $cliente->id_cliente,
        ];

        
        //dd($datosContrato);
        Contrato::create($datosContrato);
        $cliente->es_cliente = 1;
        $cliente->save();

       // $this->generarContratoPDF($id_cliente);
       return response()->json(['success' => true, 'message' => 'Contrato creado con éxito', 'id_cliente' => $id_cliente]);
       
       return redirect()->route('preContrato');

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
        // Cargar contratos con relaciones
        $contratos = Contrato::with(['cliente', 'paquete', 'precontrato'])->get();
        //$paquete = NombrePaquete::all();
        //dd($contratos);

        return view('contratosVista', compact('contratos'));
    }
}

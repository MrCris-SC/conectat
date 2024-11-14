<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\NombrePaquete;
use App\Models\Domicilio; 
use PDF;

class editarClienteController extends Controller
{
    public function editarCliente($id_cliente)
    {
        // Buscar el cliente por su ID
        //$cliente = Cliente::findOrFail($id_cliente);
        $cliente = Cliente::with('domicilio')->findOrFail($id_cliente);
        $paquetes = NombrePaquete::all();
       // $direccion = Direccion::where('fk_cliente', $id_cliente)->first();
    
        // Retornar la vista con los datos del cliente
        return view('editarCliente', compact('cliente','paquetes'));
    }

    // Método para actualizar el cliente
    public function actualizarCliente(Request $request, $id_cliente)
    {
        // Buscar el cliente por su ID
        //$cliente = Cliente::findOrFail($id_cliente);
        // Buscar el cliente por su ID
        $cliente = Cliente::with('domicilio')->findOrFail($id_cliente);
        
        
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'correo_electronico' => 'required|email',
            'telefono' => 'required|string|max:10',
            'codigo_postal' => 'required|string',
            'localidad' => 'required|string|max:255',
            'entidad_federativa' => 'required|string|max:255',
            'colonia' => 'required|string|max:255',
            'calle' => 'nullable|string|max:255',
            'referencia_domicilio' => 'required|string|max:255',
            'fk_paquete' => 'required|exists:nombres_paquetes,id_nombre_paquete',
        ]);
       // dd($request->all());
        
           // Actualizar los datos del cliente
        $cliente->nombre_completo = $validatedData['nombre_completo'];
        $cliente->correo_electronico = $validatedData['correo_electronico'];
        $cliente->telefono = $validatedData['telefono'];
        $cliente->fk_paquete = $validatedData['fk_paquete'];
        $cliente->save();
        
        // Actualizar los datos de la dirección asociada
        if ($cliente->domicilio) {
            $cliente->domicilio->codigo_postal = $validatedData['codigo_postal'];
            $cliente->domicilio->localidad = $validatedData['localidad'];
            $cliente->domicilio->entidad_federativa = $validatedData['entidad_federativa'];
            $cliente->domicilio->colonia = $validatedData['colonia'];
            $cliente->domicilio->calle = $validatedData['calle'];
            $cliente->domicilio->referencia_domicilio = $validatedData['referencia_domicilio'];
            $cliente->domicilio->save();
        }

        // Actualizar el cliente con los datos validados
        //$cliente->update($validatedData);
        
        // Redirigir a la vista de clientes registrados con un mensaje de éxito
        return redirect()->route('clientes')->with('success', 'Cliente actualizado correctamente.');
    }

    public function generarContratoPDF($id_cliente)
    {
        // Obtener los datos del cliente por su ID
        $cliente = Cliente::with('nombre_paquete')->find($id);
        //$cliente = Cliente::with(['domicilio', 'nombrePaquete'])->findOrFail($id_cliente);
        //$paquete = $cliente->nombrePaquete;
        //$cliente = Cliente::find($id_cliente);
        //dd($cliente->nombre_paquete);

        // Si el cliente no existe, manejar el error
        if (!$cliente) {
            return redirect()->route('clientes')->withErrors('Cliente no encontrado.');
        }

        // Pasar los datos a la vista del contrato
        $pdf = PDF::loadView('pdf.contrato', ['cliente' => $cliente]);

        // Descargar el PDF
        return $pdf->download('contrato_cliente_'.$cliente->id_cliente.'.pdf');
    }
}


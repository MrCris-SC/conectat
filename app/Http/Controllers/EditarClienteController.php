<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\NombrePaquete;
use App\Models\Domicilio;
use App\Models\Precontrato;  
use PDF;
use App\Http\Controllers\ContratoController;

class editarClienteController extends Controller
{
    public function editarCliente($id_cliente)
    {
        // Buscar el cliente y cargar relaciones necesarias
        $cliente = Cliente::with(['domicilio', 'nombrepaquete', 'direcciones'])->findOrFail($id_cliente);

        // Obtener todos los paquetes
        $paquetes = NombrePaquete::all();

        // Retornar la vista con los datos del cliente, direcciones y paquetes
        return view('editarCliente', compact('cliente', 'paquetes'));
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

        // Actualizar el campo fk_paquete en la tabla precontratos
        $precontrato = Precontrato::where('fk_cliente', $id_cliente)->first();
        if ($precontrato) {
            $precontrato->fk_paquete = $validatedData['fk_paquete'];
             // Verifica aquí si fk_paquete tiene el valor correcto antes de guardar
            $precontrato->save();
        }
        // Actualizar el cliente con los datos validados
        //$cliente->update($validatedData);
        
        // Redirigir a la vista de clientes registrados con un mensaje de éxito
        return redirect()->route('clientes')->with('success', 'Cliente actualizado correctamente.');
    }


}


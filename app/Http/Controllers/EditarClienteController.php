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
        $cliente = Cliente::with(['direcciones'])->findOrFail($id_cliente);

        // Filtrar las direcciones que no tengan un precontrato
        $direccionesSinPrecontrato = $cliente->direcciones->filter(function ($direccion) {
            return $direccion->precontrato === null;
        });
    
        return view('editarCliente', compact('cliente', 'direccionesSinPrecontrato'));
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
        ]);
       // dd($request->all());
        
           // Actualizar los datos del cliente
        $cliente->nombre_completo = $validatedData['nombre_completo'];
        $cliente->correo_electronico = $validatedData['correo_electronico'];
        $cliente->telefono = $validatedData['telefono'];
       
        $cliente->save();
        
       
        
        // Actualizar el cliente con los datos validados
        //$cliente->update($validatedData);
        
        // Redirigir a la vista de clientes registrados con un mensaje de éxito
        return redirect()->route('clientes')->with('success', 'Cliente actualizado correctamente.');
    }


}


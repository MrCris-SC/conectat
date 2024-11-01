<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use PDF;

class editarClienteController extends Controller
{
    public function editarCliente($id_cliente)
    {
        // Buscar el cliente por su ID
        $cliente = Cliente::findOrFail($id_cliente);
    
        // Retornar la vista con los datos del cliente
        return view('editarCliente', compact('cliente'));
    }

    // Método para actualizar el cliente
    public function actualizarCliente(Request $request, $id_cliente)
    {
        // Buscar el cliente por su ID
        $cliente = Cliente::findOrFail($id_cliente);
        
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'correo_electronico' => 'required|email',
            'telefono' => 'required|string|max:20',
            'cp' => 'required|string',
            'municipio' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'referencia_domicilio' => 'required|string|max:255',
            'fk_paquete' => 'required|exists:nombres_paquetes,id_nombre_paquete',
        ]);
        
        // Actualizar el cliente con los datos validados
        $cliente->update($validatedData);
        
        // Redirigir a la vista de clientes registrados con un mensaje de éxito
        return redirect()->route('clientes')->with('success', 'Cliente actualizado correctamente.');
    }

    public function generarContratoPDF($id)
    {
        // Obtener los datos del cliente por su ID
        $cliente = Cliente::with('nombre_paquete')->find($id);

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


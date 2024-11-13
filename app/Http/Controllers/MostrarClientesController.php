<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Cliente;
use App\Mail\VerificacionCodigo;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB; // Agrega esta línea
use App\Models\Message;


class mostrarClientesController extends Controller
{
    public function mostrarClientes()
    {
        // Obtener todos los clientes de la base de datos
        $clientes = Cliente::all();
        $mensajes = Message::latest()->take(5)->get(); // Obtiene los 5 mensajes más recientes
        
       
       // dd($clientes); // Verifica que los IDs están presentes
        // Pasar los clientes a la vista
        return view('clienteRegistrados', compact('clientes','mensajes'));
    }
 // Mostrar el formulario de edición
    public function editarCliente($id_cliente)
    {
        $cliente = Cliente::findOrFail($id_cliente); // Obtener el cliente por ID
        return view('editarCliente', compact('cliente')); // Pasar el cliente a la vista
    }

 // Actualizar el cliente en la base de datos
    public function actualizarCliente(Request $request, $id_cliente)
    {
        //dd($request->all());

        $cliente = Cliente::findOrFail($id_cliente);
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'cp' => 'required|string',
            'municipio' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'correo' => 'required|email',
            'telefono' => 'required|string|max:10',
            'referencia_domicilio' => 'required|string|max:255',
            'fk_paquete' => 'required|exists:nombres_paquetes,id_nombre_paquete', // Validar la clave foránea
            
        ]);
        

     // Actualizar el cliente

        $cliente->update($validatedData);
  

        return redirect()->route('clienteRegistrado')->with('success', 'Cliente actualizado correctamente.');
    }
      // Método para eliminar un cliente
    public function destroy($id_cliente)
    {
        $cliente = Cliente::findOrFail($id_cliente); // Buscar el cliente por ID
        $cliente->delete(); // Eliminar el cliente
        return redirect()->route('clientes')->with('success', 'Cliente eliminado correctamente.');
    }
    

}

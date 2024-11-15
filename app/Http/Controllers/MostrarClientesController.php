<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Cliente;
use App\Models\Precontrato;
use App\Models\Domicilio;
use App\Mail\VerificacionCodigo;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB; // Agrega esta línea
use App\Models\Message;


class mostrarClientesController extends Controller
{
    public function mostrarClientes()
    {
        // Consulta a través de Precontrato para obtener clientes, direcciones y paquetes relacionados
        $clientes = Precontrato::with(['cliente', 'direccion', 'paquete'])->get();
        //$clientes = Cliente::with(['precontratos', 'nombrepaquete', 'domicilio'])->get();

        //dd($clientes);
        //dd($clientes->toArray());
        //$clientes = Cliente::with(['precontratos', 'nombrepaquete', 'domicilio'])->get();
        $mensajes = Message::latest()->take(5)->get();

        return view('clienteRegistrados', compact('clientes', 'mensajes'));
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
        //$cliente->fk_paquete = $validatedData['fk_paquete'];
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
        
        
        // Redirigir a la vista de clientes registrados con un mensaje de éxito
        return redirect()->route('clientes')->with('success', 'Cliente actualizado correctamente.');
    }
      // Método para eliminar un cliente
    public function destroy($id_cliente)
    {
        $cliente = Cliente::findOrFail($id_cliente); // Buscar el cliente por ID
        $cliente->delete(); // Eliminar el cliente
        return redirect()->route('clientes')->with('success', 'Cliente eliminado correctamente.');
    }
    
}

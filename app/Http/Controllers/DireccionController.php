<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direccion;

class DireccionController extends Controller
{
    /**
     * Almacena una nueva dirección en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'fk_cliente' => 'required|exists:clientes,id_cliente', // Verifica que el cliente exista
            'calle' => 'required|string|max:255',
            'colonia' => 'required|string|max:255',
            'localidad' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'codigo_postal' => 'required|numeric',
            'referencias' => 'nullable|string|max:255',
        ]);

        $direccion = new Direccion();
        $direccion->fk_cliente = $validatedData['fk_cliente'];
        $direccion->calle = $validatedData['calle'];
        $direccion->colonia = $validatedData['colonia'];
        $direccion->localidad = $validatedData['localidad'];
        $direccion->estado = $validatedData['estado'];
        $direccion->codigo_postal = $validatedData['codigo_postal'];
        $direccion->referencias = $validatedData['referencias'];
        $direccion->save();

        // Redireccionar con un mensaje de éxito
        return redirect()->back()->with('success', 'La dirección se agregó correctamente.');
    }
    
    public function mostrarDirecciones($clienteId)
    {
        // Obtener las direcciones asociadas a un cliente específico
        $direcciones = Direccion::where('fk_cliente', $clienteId)->get();

        return view('cliente.direcciones', compact('direcciones'));
    }
}

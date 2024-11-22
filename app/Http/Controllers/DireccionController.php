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
        $request->validate([
            'fk_cliente' => 'required|exists:clientes,id_cliente',
            'calle' => 'required|string|max:255',
            'colonia' => 'required|string|max:255',
            'localidad' => 'required|string|max:255',
            'entidad_federativa' => 'required|string|max:255',
            'codigo_postal' => 'required|string|max:10',
            'referencia_domicilio' => 'nullable|string|max:500',
        ]);
        // Crear la nueva dirección
        Direccion::create($request->all());

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Dirección registrada exitosamente.');
    }
    
    public function mostrarDirecciones($clienteId)
    {
        // Obtener las direcciones asociadas a un cliente específico
        $direcciones = Direccion::where('fk_cliente', $clienteId)->get();

        return view('cliente.direcciones', compact('direcciones'));
    }
    public function update(Request $request, $id_direccion)
{
    $direcciones = Direccion::findOrFail($id_direccion);
    $request->validate([
        'calle' => 'required|string|max:255',
        'colonia' => 'required|string|max:255',
        'localidad' => 'required|string|max:255',
        'entidad_federativa' => 'required|string|max:255',
        'codigo_postal' => 'required|string|max:10',
        'referencia_domicilio' => 'nullable|string|max:500',
    ]);
    $direcciones->update($request->all());
    return redirect()->back()->with('success', 'Dirección actualizada correctamente.');
}


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NombrePaquete;
use App\Models\PromocionPaquete; // Asegúrate de importar el modelo de promociones
use App\Models\Message;

class PaqueteController extends Controller
{
    public function create()
    {
        // Recuperar todas las promociones de la tabla promociones_paquetes
        $promociones = PromocionPaquete::all();
        $mensajes = Message::latest()->take(5)->get();
        // Pasar las promociones a la vista 'agregar-paquete'
        return view('agregar-paquete', compact('promociones', 'mensajes'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'nombre_paquete' => 'required|max:50',
        'precio' => 'required|integer',
        'caracteristicas_paquete' => 'required|max:150',
        'velocidad_paquete' => 'required|max:30',
        'fk_promocion' => 'required|exists:promociones_paquetes,id_promocion'
    ]);

    try {
        // Intentar crear el paquete
        NombrePaquete::create($validated);
        return redirect()->route('paquete.index')->with('success', 'Paquete agregado exitosamente');
    } catch (\Exception $e) {
        throw $e;
        // Manejar el error
        //return redirect('/agregar-paquete')->with('error', 'Hubo un problema. La página está fuera de servicio, intenta más tarde.');
    }
}


    public function edit($id)
    {
        $paquete = NombrePaquete::findOrFail($id);
        $promociones = PromocionPaquete::all(); // Obtener todas las promociones
        $mensajes = Message::latest()->take(5)->get();
        return view('editar-paquete', compact('paquete', 'promociones', 'mensajes'));
    }

    public function update(Request $request, $id)
    {
        $paquete = NombrePaquete::findOrFail($id);

        $validated = $request->validate([
            'nombre_paquete' => 'required|max:50',
            'precio' => 'required|integer',
            'caracteristicas_paquete' => 'required|max:150',
            'velocidad_paquete' => 'required|max:30',
            'fk_promocion' => 'required|exists:promociones_paquetes,id_promocion'
        ]);

        $paquete->update($validated);
        return redirect()->route('paquete.index')->with('success', 'Paquete actualizado exitosamente');
    }

    public function destroy($id)
    {
        $paquete = NombrePaquete::findOrFail($id);
        $paquete->delete();

        return redirect()->route('paquete.index')->with('success', 'Paquete eliminado exitosamente');
    }



}

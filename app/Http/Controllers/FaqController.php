<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqPregunta;
use App\Models\Message;

class FaqController extends Controller
{
    public function index()
    {
        $preguntas = FaqPregunta::all();
        
        $mensajes = Message::latest()->take(5)->get();
        return view('faq.faqvista', compact('preguntas', 'mensajes'));
    }


    public function edit($id)
    {
        $pregunta = FaqPregunta::findOrFail($id);
        $mensajes = Message::latest()->take(5)->get();
        return view('faq.edit', compact('pregunta', 'mensajes'));
    }

    public function destroy($id)
    {
        $pregunta = FaqPregunta::findOrFail($id);
        $pregunta->delete();
        return redirect()->route('faq.index')->with('success', 'Pregunta eliminada correctamente');
    }

    public function update(Request $request, $id)
{
    // Validar los datos recibidos
    $request->validate([
        'pregunta' => 'required|max:100',
        'respuesta_pregunta' => 'required',
        'fk_categoria' => 'required|integer',
    ]);

    // Buscar la pregunta por ID y actualizarla
    $pregunta = FaqPregunta::findOrFail($id);
    $pregunta->update($request->only('pregunta', 'respuesta_pregunta', 'fk_categoria'));

    // Redirigir al listado con un mensaje de éxito
    return redirect()->route('faq.index')->with('success', 'Pregunta actualizada correctamente');
}

}

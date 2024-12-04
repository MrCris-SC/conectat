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
        return view('faq.edit', compact('pregunta'));
    }

    public function destroy($id)
    {
        $pregunta = FaqPregunta::findOrFail($id);
        $pregunta->delete();
        return redirect()->route('faq.index')->with('success', 'Pregunta eliminada correctamente');
    }
}

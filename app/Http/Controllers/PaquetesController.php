<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NombresPaquetes;
use App\Models\Message;

class PaquetesController extends Controller
{
    public function index()
    {
        // Traemos los paquetes con sus respectivas promociones
        $paquetes = NombresPaquetes::with('promocion')->get();

        $mensajes = Message::latest()->take(5)->get(); // Obtiene los 5 mensajes más recientes
        //return view('index', compact('mensajes'));

        //return view('index', compact('paquetes'));
        // Retornamos ambas variables a la vista
        return view('index', compact('paquetes', 'mensajes'));
    }

   
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; // Agregar esta línea
use App\Mail\MensajeContacto;

class ContactoController extends Controller
{
    //
    public function contacto()
    {
        return view('contacto');
    }

    public function enviarMensaje(Request $request)
    {
        // Validar datos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'mensaje' => 'required|string|max:500',
        ]);

        // Enviar el correo electrónico
        Mail::to('winecahuich@gmail.com')->send(new MensajeContacto($validated));

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', '¡Tu mensaje ha sido enviado con éxito!');
    }
}

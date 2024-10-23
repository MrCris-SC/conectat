<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\miPrecontrato;
class mailController extends Controller
{
    public function enviarCorreo(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email',
        ]);

        // Obtener los datos del formulario
        $nombre_usuario = $request->input('nombre');
        $correo_usuario = $request->input('correo');

        // Enviar el correo
        Mail::to($correo_usuario)->send(new miPrecontrato($nombre_usuario, $correo_usuario));

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Correo enviado correctamente.');
    }
}



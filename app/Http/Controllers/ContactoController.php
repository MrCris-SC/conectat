<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; // Agregar esta línea
use App\Mail\MensajeContacto;
use App\Models\Message;
use App\Mail\RespuestaMensaje;


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

         // Guardar el mensaje en la base de datos
        Message::create([
            'nombre' => $validated['nombre'],
            'correo_mensaje' => $validated['correo'],
            'mensaje' => $validated['mensaje'],
        ]);
        
         // Redirigir con un mensaje de éxito
         return redirect()->back()->with('success', '¡Tu mensaje ha sido enviado con éxito!');
    }
    public function enviarRespuesta(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'correo' => 'required|email',
            'respuesta' => 'required|string',
        ]);

        // Obtener el mensaje original de la base de datos
        $mensaje = Message::where('correo_mensaje', $validated['correo'])->first();

         // Enviar correo con el mensaje y la respuesta
        Mail::to($validated['correo'])->send(new RespuestaMensaje($mensaje, $validated['respuesta']));

        // Redirigir con un mensaje de éxito
        return back()->with('success', 'Respuesta enviada exitosamente.');
    }
}

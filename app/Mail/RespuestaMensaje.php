<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Message;

class RespuestaMensaje extends Mailable
{
    use Queueable, SerializesModels;
    public $mensaje;
    public $respuesta;

    public function __construct(Message $mensaje, $respuesta)
    {
        $this->mensaje = $mensaje;
        $this->respuesta = $respuesta;
    }

    public function build()
    {
        return $this->subject('Respuesta a tu mensaje')
                    ->view('mails.respuesta') // Vista que contiene el cuerpo del correo
                    ->with([
                        'mensaje' => $this->mensaje,
                        'respuesta' => $this->respuesta,
                    ]);
    }

}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class miPrecontrato extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre_usuario;
    public $correo_usuario;
    public $direccion_itssy;
    public $nombre_paquete;
    public $municipio;
    public $direccion;
    public $telefono;
    public $referencia_domicilio;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre_usuario, $correo_usuario,$nombre_paquete,$municipio,$direccion,$telefono,$referencia_domicilio)
    {
        $this->nombre_usuario = $nombre_usuario;
        $this->correo_usuario = $correo_usuario;
        $this->nombre_paquete = $nombre_paquete;
        $this->municipio = $municipio;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->referencia_domicilio = $referencia_domicilio;
        $this->direccion_itssy = "Av. Tecnológico S/N, Col. Tecnológico, 97980 Tzucacab, Yucatán";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    
    public function build()
    {
        return $this->subject('Confirmación de Precontrato')
                    ->view('mails.envioDatos');
                    /*->from('no-reply@itssy.edu.mx') */
    }
}

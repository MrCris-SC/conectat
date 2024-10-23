<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrarAdministrador extends Controller
{
     // El nombre y la descripción del comando
     protected $signature = 'registrar:admin';

     protected $description = 'Registrar un nuevo administrador';
 
     public function __construct()
     {
         parent::__construct();
     }
 
     public function handle()
     {
         // Pedir los datos al usuario
         $nombre = $this->ask('Introduce el nombre del administrador');
         $correo = $this->ask('Introduce el correo electrónico');
         $contraseña = $this->secret('Introduce la contraseña');
 
         // Crear un nuevo registro de administrador
         $admin = Administrador::create([
             'Nombre' => $nombre,
             'Correo_electronico' => $correo,
             'Contraseña' => Hash::make($contraseña),
             'permisos' => 'admin',
         ]);
 
         $this->info('¡Administrador registrado exitosamente!');
     }
}

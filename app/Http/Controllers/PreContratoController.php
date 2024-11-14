<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Domicilio;
use App\Models\Precontrato;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\miPrecontrato;
use App\Mail\VerificacionCodigo;
use Illuminate\Support\Str;


class PreContratoController extends Controller
{
    public function mostrarFormulario()
    {
        return view('datos');
    }
    public function enviarCodigo(Request $request) 
    {
        // Validar los datos del formulario de usuario y domicilio
        $userDada = $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'correo_electronico' => 'required|email',
            'telefono' => 'required|string|max:20',
        ]);
        $houseData = $request->validate([
            'cp' => 'required|string',
            'municipio' => 'required|string|max:255',
            'entidad' => 'required|string|max:255',
            'colonia' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',            
            'referencia_domicilio' => 'required|string|max:255',
        ]);
    
        // Verificar si el correo ya está registrado
        $clienteExistente = Cliente::where('correo_electronico', $request->correo_electronico)->first();
        if ($clienteExistente) {
            return back()->withErrors(['correo_electronico' => 'Este correo ya está registrado.'])->withInput();
        }
    
        // Verificar y guardar el id del paquete
        $validatedData = $userDada;
        if (session()->has('id_nombre_paquete')) {
            $validatedData['fk_paquete'] = session('id_nombre_paquete');
        }
    
        // Generar código aleatorio y enviar correo
        $codigoVerificacion = Str::random(6);
        Mail::to($request->correo_electronico)->send(new verificacionCodigo($codigoVerificacion));
    
        // Guardar datos temporalmente en la sesión
        session([
            'codigo_verificacion' => $codigoVerificacion,
            'datos_cliente' => $validatedData,
            'datos_domicilio' => $houseData
        ]);
    
        return redirect()->route('verificarCodigo');
    }
    
   


public function verificarCodigo(Request $request)
{
    // Validar el código
    $request->validate([
        'codigo' => 'required',
    ]);
    
    // Verificar si el código ingresado es igual al código en la sesión
    if ($request->codigo === session('codigo_verificacion')) {
        DB::enableQueryLog(); // Habilitar el registro de consultas para depuración

        // Obtener los datos del cliente desde la sesión
        $clienteData = session('datos_cliente');
        
        // Crear un nuevo cliente
        $cliente = Cliente::create([
            'nombre_completo' => $clienteData['nombre_completo'],
            'correo_electronico' => $clienteData['correo_electronico'],
            'telefono' => $clienteData['telefono'],
            'fk_paquete' => $clienteData['fk_paquete'],
        ]);
        $houseData = session('datos_domicilio');
        // Crear una nueva dirección
        $domicilio = Domicilio::create([
            'calle' => $houseData['direccion'] ?? null,
            'codigo_postal' => $houseData['cp'], // Si el 'cp' es parte de la dirección
            'colonia' => $houseData['colonia'],
            'localidad' => $houseData['municipio'],
            'entidad_federativa' => $houseData['entidad'],
            'referencia_domicilio' => $houseData['referencia_domicilio'],
            'fk_cliente' => $cliente->id_cliente, 
        ]);
        
        // Crear un precontrato relacionado con el cliente y la dirección
        Precontrato::create([
            'fk_cliente' => $cliente->id_cliente,  // Relación con el cliente creado
            'fk_direccion' => $domicilio->id_direccion,  // Relación con la dirección creada
            'fk_paquete' => $clienteData['fk_paquete'], // Usar el ID del paquete almacenado en la sesión
        ]);

        // Obtener el nombre del paquete
        $idPaquete = $clienteData['fk_paquete'];
        $nombre_paquete = DB::table('nombres_paquetes')->where('id_nombre_paquete', $idPaquete)->value('nombre_paquete');

        // Enviar el correo después de crear el cliente y precontrato
        $nombre_usuario = $clienteData['nombre_completo'];
        $correo_usuario = $clienteData['correo_electronico'];
        $localidad = $houseData['municipio'];
        $direccion = $houseData['direccion'];
        $telefono = $clienteData['telefono'];
        $referencia_domicilio = $houseData['referencia_domicilio'];

        // Enviar el correo utilizando el Mailable
        Mail::to($correo_usuario)->send(new miPrecontrato(
            $nombre_usuario,
            $correo_usuario,
            $nombre_paquete,
            $localidad,
            $direccion,
            $telefono,
            $referencia_domicilio
        ));

        // Limpiar los datos de la sesión
        session()->forget(['codigo_verificacion', 'datos_cliente']);

        // Redirigir a la página de paquetes
        return redirect()->route('mostrar.paquetes');
    } else {
        // Si el código no es válido, redirigir con un mensaje de error
        return back()->withErrors(['codigo' => 'El código ingresado es incorrecto.']);
    }
}


    public function seleccionarPaquete($id_nombre_paquete)
    {
        // Guardar el ID del paquete en la sesión
        session(['id_nombre_paquete' => $id_nombre_paquete]);
    
        // Redirigir al formulario de datos personales
        return redirect()->route('mostrarFormulario');
    }

    public function mostrarVerificacion()
    {
        return view('verificar-Codigo');
    }
    
}

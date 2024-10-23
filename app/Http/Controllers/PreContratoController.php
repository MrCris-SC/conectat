<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Cliente;
use App\Mail\VerificacionCodigo;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB; // Agrega esta línea
use App\Mail\miPrecontrato;

class PreContratoController extends Controller
{
    public function mostrarFormulario()
    {
        return view('datos');
    }

    public function enviarCodigo(Request $request) 
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'cp' => 'required|string',
            'municipio' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'correo_electronico' => 'required|email',  // Cambiado a 'correo_electronico'
            'telefono' => 'required|string|max:20',
            'referencia_domicilio' => 'required|string|max:255',
        ]);

        // Verificar si el correo ya está registrado
        $clienteExistente = Cliente::where('correo_electronico', $request->correo_electronico)->first();  // Cambiado a 'correo_electronico'
        if ($clienteExistente) {
            // Si el correo ya está registrado, devolver un error
            return back()->withErrors(['correo_electronico' => 'Este correo ya está registrado.'])->withInput();  // Cambiado a 'correo_electronico'
        }

        // Aquí se verifica si el id del paquete se cargó correctamente
        if (session()->has('id_nombre_paquete')) {
            // Añadir el id_nombre_paquete a los datos validados
            $validatedData['fk_paquete'] = session('id_nombre_paquete');
        }

        // Generar código aleatorio
        $codigoVerificacion = Str::random(6);

        // Enviar correo con el código
        Mail::to($request->correo_electronico)->send(new VerificacionCodigo($codigoVerificacion));  // Cambiado a 'correo_electronico'

        // Guardar los datos temporalmente en la sesión
        session(['codigo_verificacion' => $codigoVerificacion, 'datos_cliente' => $validatedData]);

        return redirect()->route('verificarCodigo');
    }



    public function mostrarVerificacion()
    {
        return view('verificar-Codigo');
    }

   
    public function verificarCodigo(Request $request)
    {
        $request->validate([
            'codigo' => 'required',
        ]);
    
        if ($request->codigo === session('codigo_verificacion')) {
            DB::enableQueryLog();
    
            // Crear un nuevo cliente en la base de datos
            Cliente::create(session('datos_cliente'));
    
            // Obtener el nombre del paquete a partir del fk_paquete almacenado en la sesión
            $idPaquete = session('datos_cliente')['fk_paquete'];
            $nombre_paquete = DB::table('nombres_paquetes')->where('id_nombre_paquete', $idPaquete)->value('nombre_paquete'); // Suponiendo que la tabla es 'paquetes'

            // Enviar correo después de crear el cliente
            $nombre_usuario = session('datos_cliente')['nombre_completo']; // Obtén el nombre del cliente
            $correo_usuario = session('datos_cliente')['correo_electronico']; // Obtén el correo del cliente
            $municipio = session('datos_cliente')['municipio']; // Obtén el nombre del cliente
            $direccion = session('datos_cliente')['direccion']; // Obtén el correo del cliente
            $telefono = session('datos_cliente')['telefono']; // Obtén el nombre del cliente
            $referencia_domicilio = session('datos_cliente')['referencia_domicilio']; // Obtén el correo del cliente
    
            // Envía el correo utilizando el Mailable que creaste
            Mail::to($correo_usuario)->send(new miPrecontrato($nombre_usuario, $correo_usuario,$nombre_paquete,$municipio,$direccion,$telefono,$referencia_domicilio)); 
            // Limpiar sesión
            session()->forget(['codigo_verificacion', 'datos_cliente']);
    
            return redirect()->route('mostrar.paquetes');
        } else {
            return back()->withErrors(['codigo' => 'El código ingresado es incorrecto.']);
        }
    }
    public function seleccionarPaquete($id_nombre_paquete)
    {
        // Verificar si el paquete existe en la base de datos
        
    
        // Guardar el ID del paquete en la sesión
        session(['id_nombre_paquete' => $id_nombre_paquete]);
    
        // Redirigir al formulario de datos personales
        return redirect()->route('mostrarFormulario');
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Administrador;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function showRegisterForm()
    {
        return view('adminRegister');
    }

    public function register(Request $request)
    {
        // Validar los datos
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Correo_electronico' => 'required|string|email|max:255|unique:administradores',
            'Contraseña' => 'required|string|min:8',
            'permisos' => 'required|string',
            
        ]);

        // Crear un nuevo administrador
        $admin = Administrador::create([
            'Nombre' => $request->Nombre,
            'Correo_electronico' => $request->Correo_electronico,
            'Contraseña' => Hash::make($request->Contraseña),
            'permisos' => $request->permisos,
            'fk_usuario'=> '1',
        ]);

        // Redirigir a la página que prefieras con un mensaje de éxito
        return redirect()->route('admin.registerForm')->with('success', 'Administrador registrado exitosamente.');
    }

    public function listAdmins()
    {
    // Obtener todos los administradores
    $administradores = Administrador::all();

    // Retornar la vista con los administradores
    return view('indexAdmin', ['administradores' => $administradores]);
    }

    public function destroy($id)
{
    // Encontrar al administrador por ID y eliminarlo
    $admin = Administrador::find($id);
    $admin->delete();

    // Redirigir con mensaje de éxito
    return redirect()->route('admin.list')->with('success', 'Administrador eliminado correctamente.');
}



public function login(Request $request)
    {
       // if(!auth()-> guard('admin')->check()){
         //   return view('admin.login')}
        //return redirect()-> route('/')

        $request->validate([
            'Correo_electronico' => 'required|email',
            'Contraseña' => 'required',
        ]);

        $credentials = $request->only('Correo_electronico', 'Contraseña');

        // Buscar al administrador por correo electrónico
        $admin = Administrador::where('Correo_electronico', $credentials['Correo_electronico'])->first();

        // Verificar si el administrador existe y si la contraseña es correcta
        if ($admin && Hash::check($credentials['Contraseña'], $admin->Contraseña)) {
            // Autenticar al administrador manualmente
            Auth::guard('admin')->login($admin);

            // Redirigir al dashboard o página deseada
            return redirect()->intended('/');
        }

        // Si las credenciales no son correctas
        return redirect()->back()->with('error', 'Las credenciales no son correctas');
    }

    public function auth(AuthAdminRequest $request){
        if($request-> validated()){
            if(auth()->guard('admin')()->attempt){
                
            }
        }
    }
    
}

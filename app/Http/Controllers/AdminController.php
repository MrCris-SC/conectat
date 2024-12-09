<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Administrador;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AuthAdminRequest;
use App\Models\Message;

class AdminController extends Controller
{

    public function showRegisterForm()
    {
        $mensajes = Message::latest()->take(5)->get();
        return view('adminRegister', compact('mensajes'));
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
            'nombre' => $request->Nombre,
            'correo_electronico' => $request->Correo_electronico,
            'password' => Hash::make($request->Contraseña),
            'permisos' => $request->permisos,
            
        ]);

        // Redirigir a la página que prefieras con un mensaje de éxito
        return redirect()->route('admin.registerForm')->with('success', 'Administrador registrado exitosamente.');
    }

    public function listAdmins()
    {
    // Obtener todos los administradores
    $administradores = Administrador::all();
    $mensajes = Message::latest()->take(5)->get();
    // Retornar la vista con los administradores
    return view('indexAdmin', compact('administradores', 'mensajes'));
    }

    public function destroy($id)
{
    // Encontrar al administrador por ID y eliminarlo
    $admin = Administrador::find($id);
    $admin->delete();

    // Redirigir con mensaje de éxito
    return redirect()->route('admin.list')->with('success', 'Administrador eliminado correctamente.');
}

    // Método para mostrar el formulario de edición
    public function edit($id_admin)
    {
        $admin = Administrador::findOrFail($id_admin); // Encuentra el administrador por ID

        //dd($admin);

        
        $mensajes = Message::latest()->take(5)->get();
        return view('editarAdmin', compact('admin', 'mensajes')); // Retorna la vista con el administrador

    }

    // Método para procesar la actualización del administrador
    public function ActualizarAdmin(Request $request, $id_admin)
    {
        $admin = Administrador::findOrFail($id_admin); // Encuentra el administrador por ID
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'Nombre' => 'required|string|max:255',
            'Correo_electronico' => 'required|string|email|max:255|unique:administradores,Correo_electronico,' . $id_admin . ',id_admin',
            'permisos' => 'required|string',
            'Contraseña' => 'nullable|string|min:8', // Contraseña es opcional
        ]);
        // Actualizar la contraseña si se proporciona
        // Actualizar los campos del administrador
        $admin->Nombre = $validatedData['Nombre'];
        $admin->Correo_electronico = $validatedData['Correo_electronico'];
        $admin->permisos = $validatedData['permisos'];
        if (!empty($validatedData['Contraseña'])) {
            $admin->Contraseña = Hash::make($validatedData['Contraseña']);
        }

        $admin->save(); // Guardar los cambios

        // Redirigir con un mensaje de éxito
        return redirect()->route('admin.list')->with('success', 'Administrador actualizado correctamente.');
    }


    public function login(Request $request)
        {
            if(!auth()-> guard('admin')->check()){
                return view('login');
            }
            return redirect()-> route('/');
        }

    public function auth(AuthAdminRequest $request){
        if($request-> validated()){

            $remember = $request->has('remember'); 

            if(auth()->guard('admin')->attempt([
                'Correo_electronico' => $request->correo_electronico,
                'password' => $request->password,  // Hash::make($request->Contraseña)
            ],$remember)){
                $request -> session()->regenerate();
                
                // Obtén el nombre del usuario autenticado y guárdalo en la sesión
                $nombreAdmin = auth()->guard('admin')->user()->Nombre;
                session(['nombreAdmin' => $nombreAdmin]);

                return redirect()->route('paquete.index');

            } else{
                return redirect()->route('admin.login')->with(
                    [
                        'error' => 'No se pudo iniciar sesión. Por favor verifica tus credenciales.'
                    ]);
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout(); // Cerrar sesión del administrador

        $request->session()->invalidate(); // Invalidar la sesión

        $request->session()->regenerateToken(); // Regenerar el token de sesión

        return redirect()->route('admin.login'); // Redirigir a la página de login
    }

}

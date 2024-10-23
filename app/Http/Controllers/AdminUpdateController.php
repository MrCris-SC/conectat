<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdministradorUpdate;
use Illuminate\Support\Facades\Hash;

class AdminUpdateController extends Controller
{
    // Método para mostrar el formulario de edición
    public function edit($id_admin)
    {
        $admin = AdministradorUpdate::findOrFail($id_admin); // Encuentra el administrador por ID
        return view('editarAdmin', ['admin' => $admin]); // Retorna la vista con el administrador
    }

    // Método para procesar la actualización del administrador
    public function ActualizarAdmin(Request $request, $id_admin)
    {
        $admin = AdministradorUpdate::findOrFail($id_admin); // Encuentra el administrador por ID
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'Nombre' => 'required|string|max:255',
            'Correo_electronico' => 'required|string|email|max:255|unique:administradores,Correo_electronico,' . $id_admin . ',id_admin',
            'permisos' => 'required|string',
            'Contraseña' => 'nullable|string|min:8', // Contraseña es opcional
        ]);
        // Actualizar la contraseña si se proporciona
        if (!empty($validatedData['Contraseña'])) {
            $admin->Contraseña = Hash::make($validatedData['Contraseña']);
        }

        //$admin->save(); // Guardar los cambios
        // Actualizar el cliente con los datos validados
        $admin->update($validatedData);

        // Redirigir con un mensaje de éxito
        return redirect()->route('admin.list')->with('success', 'Administrador actualizado correctamente.');
    }
}

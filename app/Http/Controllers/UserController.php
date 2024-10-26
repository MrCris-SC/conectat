<?php

namespace App\Http\Controllers;

use App\Models\NombrePaquete;

class userController extends Controller
{
    public function showPackages()
    {
        $paquetes = NombrePaquete::with('promocion')->get(); // Carga la relación con promociones
        return view('user', compact('paquetes'));
    }

}

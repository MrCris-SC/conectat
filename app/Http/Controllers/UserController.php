<?php

namespace App\Http\Controllers;

use App\Models\NombrePaquete;

class userController extends Controller
{
    public function showPackages()
    {
        $paquetes = NombrePaquete::with('promocion')
        ->whereHas('promocion', function($query) {
            $query->where('id_promocion', '==', 0); // Filtrar donde la promoción no sea 0
        })
        ->get(); // Carga la relación con promociones
        return view('user', compact('paquetes'));
    }
     
    public function promociones()
    {
        // Cargar solo los paquetes que tienen promociones (fk_promocion != 0)
        $paquetes = NombrePaquete::with('promocion')
            ->whereHas('promocion', function($query) {
                $query->where('id_promocion', '!=', 0); // Filtrar donde la promoción no sea 0
            })
            ->get();

        return view('paquetePromocion', compact('paquetes'));

    }

}



<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Contrato;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;


class PagosController extends Controller
{

    public function verificarPagosYContratos()
    {
        $hoy = Carbon::now()->startOfDay(); // Asegura que trabajamos con fechas al inicio del día
    
        // Obtener todos los pagos cuya fecha de pago es anterior a hoy
        $pagos = Pago::where('fecha_pago', '<', $hoy)->get();
    
        foreach ($pagos as $pago) {
            $fechaPago = Carbon::parse($pago->fecha_pago)->startOfDay(); // Aseguramos que sea solo fecha
            $diasAtraso = $fechaPago->diffInDays($hoy, false); // Incluye signo negativo si está en el futuro
    
            Log::info("Procesando pago ID: {$pago->id_pago}, Fecha Pago: {$pago->fecha_pago}, Estado: {$pago->estado_pago}, Días Atraso: {$diasAtraso}");
    
            // Cambiar a "atrasado" si el atraso es mayor o igual a 1 día pero menor o igual a 10 días
            if ($diasAtraso >= 1 && $diasAtraso <= 10 && $pago->estado_pago === 'pendiente') {
                $pago->estado_pago = 'atrasado';
                $pago->save();
                Log::info("Pago ID: {$pago->id_pago} cambiado a 'atrasado'.");
            }
    
            // Cambiar a "vencido" si el atraso es mayor a 10 días
            if ($diasAtraso > 10 && $pago->estado_pago !== 'vencido') {
                $pago->estado_pago = 'vencido';
                $pago->monto_acumulado_pagos += 80; // Agregar multa
                $pago->save();
                Log::info("Pago ID: {$pago->id_pago} cambiado a 'vencido'. Multa aplicada.");
            }
        }

        // Revisar contratos relacionados con pagos vencidos
    $contratos = Contrato::with('pagos')->get();

    foreach ($contratos as $contrato) {
        $pagosVencidos = $contrato->pagos->where('estado_pago', 'vencido');

        // Si el contrato tiene al menos un pago vencido, cambiar el estado a "suspendido"
        if ($pagosVencidos->count() > 0 && $contrato->estado_contrato !== 'suspendido') {
            $contrato->estado = 'suspendido';
            $contrato->save();
            Log::info("Contrato ID: {$contrato->id_contrato} cambiado a 'suspendido' debido a pagos vencidos.");
        }
    }
    
        return redirect()->route('paquete.index')->with('success', 'Pagos y contratos actualizados correctamente.');
    }
}

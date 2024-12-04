<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Contrato;
use Carbon\Carbon;

class PagosController extends Controller
{
    public function verificarPagosYContratos()
    {
        // Obtener todos los pagos que son 'pendientes' y verificar su vencimiento
        $hoy = Carbon::now();
        
        // Verificar pagos atrasados y cambiar el estado a 'atrasado' si corresponde
        $pagosAtrasados = Pago::whereIn('estado_pago', ['pendiente', 'atrasado']) // Incluir "atrasado" en la búsqueda
        ->where('fecha_pago', '<', $hoy) // Verificar pagos cuyo fecha_pago sea menor a hoy
        ->get();

        foreach ($pagosAtrasados as $pago) {
        // Si el pago está en estado "pendiente" y ha pasado la fecha de pago, cambiarlo a "atrasado"
        if ($pago->estado_pago === 'pendiente') {
            $pago->estado_pago = 'atrasado';
            $pago->save();
        }

        // Si el pago está en estado "atrasado" por más de 10 días, cambiar el estado a "vencido"
        if ($pago->estado_pago == 'atrasado' && $hoy->diffInDays($pago->fecha_pago) > 10) {
            $pago->estado_pago = 'vencido';
            $pago->monto_acumulado_pagos += 80; // Agregar multa de 80 pesos
            $pago->save();
        }
        }

        // Verificar contratos asociados a los pagos vencidos y suspender los contratos correspondientes
        foreach ($pagosAtrasados as $pago) {
            if ($pago->estaestado_pago == 'vencido') {
                $contrato = Contrato::find($pago->fk_contrato);

                // Cambiar el estado del contrato a 'suspendido' si está activo
                if ($contrato && $contrato->estado == 'activo') {
                    $contrato->estado = 'suspendido';
                    $contrato->save();
                }
            }
        }

        // Retornar una respuesta indicando que el proceso fue realizado
        return redirect()->route('paquete.index')->with('success', 'Pagos y contratos actualizados correctamente.');
    }
}

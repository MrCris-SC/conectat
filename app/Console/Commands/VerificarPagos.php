<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pago;
use Carbon\Carbon;

class VerificarPagos extends Command
{
    /**
     * El nombre y firma del comando.
     *
     * @var string
     */
    protected $signature = 'pagos:verificar';

    /**
     * Descripción del comando.
     *
     * @var string
     */
    protected $description = 'Verifica pagos atrasados y vencidos según la fecha de pago';

    /**
     * Ejecuta el comando.
     */
    public function handle()
    {
        // Obtener la fecha actual
        $hoy = Carbon::now();

        // Actualizar pagos atrasados (1 día después de fecha_pago)
        Pago::where('fecha_pago', '<', $hoy->subDays(1))
            ->where('estado', 'pendiente')
            ->update(['estado' => 'atrasado']);

        // Actualizar pagos vencidos (10 días después de fecha_pago)
        Pago::where('fecha_pago', '<', $hoy->subDays(10))
            ->where('estado', 'atrasado')
            ->update(['estado' => 'vencido', 
            'monto_acumulado_pagos' => \DB::raw('COALESCE(monto_acumulado_pagos, 0) + 80')
        ]);
            

        $this->info('Pagos actualizados correctamente.');
    }
}

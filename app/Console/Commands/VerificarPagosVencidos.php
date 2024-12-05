<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pago; // Modelo de pagos
use App\Models\Contrato; // Modelo de contratos
use Carbon\Carbon;

class VerificarPagosVencidos extends Command
{
    protected $signature = 'pagos:verificar-vencidos';
    protected $description = 'Verifica pagos vencidos y suspende los contratos correspondientes';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Obtener los pagos vencidos (suponiendo que 'fecha_pago' es la fecha límite)
        $pagosVencidos = Pago::where('fecha_pago', '<', Carbon::now())
                            ->where('estado', '!=', 'atrasado') // Solo si no están ya atrasados
                            ->get();

        // Iterar sobre los pagos vencidos y suspender el contrato
        foreach ($pagosVencidos as $pago) {
            // Obtener el contrato asociado
            $contrato = Contrato::find($pago->fk_contrato);

            if ($contrato) {
                // Cambiar el estado del contrato a suspendido
                $contrato->estado = 'suspendido';
                $contrato->save();

                $this->info('Contrato suspendido por pago vencido: ' . $contrato->id);
            }
        }
    }
}

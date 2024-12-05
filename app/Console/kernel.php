<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Registrar comandos.
     *
     * @var array
     */
    protected $commands = [
        Commands\VerificarPagos::class, 
        Commands\VerificarPagosVencidos::class,
    ];

    /**
     * Definir las tareas programadas.
     */
    protected function schedule(Schedule $schedule)
    {
        // Programa el comando para que se ejecute diariamente
        $schedule->command('pagos:verificar')->daily();
        $schedule->command('pagos:verificar-vencidos')->dailyAt('02:00');
    }

    /**
     * Registrar tareas de consola para ejecutar en Artisan.
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');
        require base_path('routes/console.php');
    }
}

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaquetesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\PreContratoController;
use App\Http\Controllers\MostrarClientesController;
use App\Http\Controllers\EditarClienteController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUpdateController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\AcercaNosotrosController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\DireccionController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\PreguntasFrecuentesController;

use App\Http\Controllers\FaqController;



Route::post('/cliente/{id_cliente}/contrato', [ContratoController::class, 'crearContrato'])->name('cliente.contrato');


// Ruta para el formu8lario de login
Route::get('/login',[AdminController::class,'login'])->name('login');

Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/login', [AdminController::class, 'login']);

// Ruta para procesar el login
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');

// Rutas protegidas
Route::middleware('admin')->group(function () {
    Route::get('/', [PaquetesController::class, 'index'])->name('paquete.index');
        
    //Rutas para despues de iniciar sesion necesitan protegerser
    Route::get('/agregar-paquete', [PaqueteController::class, 'create']);
    Route::post('/agregar-paquete', [PaqueteController::class, 'store']);
    Route::get('/editar-paquete/{id}', [PaqueteController::class, 'edit'])->name('paquete.edit');
    Route::put('/editar-paquete/{id}', [PaqueteController::class, 'update'])->name('paquete.update');
    Route::delete('/paquete/{id}', [PaqueteController::class, 'destroy'])->name('paquete.destroy');

    // Rutas para manejar clientes
    Route::get('/clienteRegistrados', [MostrarClientesController::class, 'mostrarClientes'])->name('clientes');
    Route::delete('/cliente/{id}', [MostrarClientesController::class, 'destroy'])->name('cliente.destroy');
    Route::get('/clienteRegistrados/{id}', [EditarClienteController::class, 'editarCliente'])->name('cliente.edit');
    Route::put('/cliente/{id}', [EditarClienteController::class, 'actualizarCliente'])->name('cliente.update');

    Route::post('/direccion', [DireccionController::class, 'store'])->name('direccion.store');
    Route::get('/cliente/{id}/direcciones', [DireccionController::class, 'mostrarDirecciones'])->name('cliente.direcciones');
    Route::post('/direcciones', [DireccionController::class, 'store'])->name('direcciones.add');

    // Mostrar el formulario de registro
    Route::get('adminRegister', [AdminController::class, 'showRegisterForm'])->name('admin.registerForm');

    // Ruta para mostrar la lista de administradores
    Route::get('/indexAdmin', [AdminController::class, 'listAdmins'])->name('admin.list');
    // Ruta para eliminar administradores
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');


    // Procesar el formulario de registro
    Route::post('/adminRegister', [AdminController::class, 'register'])->name('admin.register');

    // Rutas para mostrar el formulario de edición de un administrador
    Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');

    // Ruta para procesar la actualización del administrador
    Route::put('/admin/{id}', [AdminController::class, 'ActualizarAdmin'])->name('admin.update');
    
    Route::get('/precontratos', [PreContratoController::class, 'index'])->name('precontratos.index');
   
    Route::put('/precontrato/{id_precontrato}/cambiar-paquete', [PrecontratoController::class, 'cambiarPaquete'])->name('precontrato.cambiarPaquete');
   
    // Crear contrato
   Route::get('/contratos', [ContratoController::class, 'mostrarContratos'])->name('mostrar.contratos');

    //Route::post('/contratos/crear/{id_cliente}', [ContratoController::class, 'crearContrato'])->name('contratos.crear');

});
//Cerrar Sesion
Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
//Rutas publicas
Route::get('/user', [UserController::class, 'showPackages'])->name('mostrar.paquetes');
Route::get('/datos', function () { return view('datos'); });

// Otras rutas
Route::get('/recuperar', function () { return view('password'); });
Route::get('/registro', function () { return view('registro'); });
Route::get('/precontrato', [PreContratoController::class, 'mostrarFormulario'])->name('mostrarFormulario');
Route::post('/precontrato/enviar-codigo', [PreContratoController::class, 'enviarCodigo'])->name('enviarCodigo');
Route::get('/precontrato/verificar-Codigo', [PreContratoController::class, 'mostrarVerificacion'])->name('verificarCodigo');
Route::post('/precontrato/verificar-Codigo', [PreContratoController::class, 'verificarCodigo'])->name('verificarCodigo');
Route::get('/seleccionar-paquete/{id_nombre_paquete}', [PreContratoController::class, 'seleccionarPaquete'])->name('seleccionarPaquete');
Route::post('/enviar-correo', [MailController::class, 'enviarCorreo'])->name('enviar.correo');




Route::get('/acercaNosotros', [AcercaNosotrosController::class, 'acerca'])->name('acerca');
Route::get('/contacto', [ContactoController::class, 'contacto'])->name('contacto');
Route::post('/enviar-mensaje', [ContactoController::class, 'enviarMensaje'])->name('enviar-mensaje');

Route::post('/direccion', [DireccionController::class, 'store'])->name('direccion.store');
Route::get('/cliente/{id}/direcciones', [DireccionController::class, 'mostrarDirecciones'])->name('cliente.direcciones');
Route::post('/direcciones', [DireccionController::class, 'store'])->name('direcciones.add');
Route::put('/direccion/update/{id}', [DireccionController::class, 'update'])->name('direcciones.update');

Route::post('/precontratos/registrar', [PrecontratoController::class, 'registrar'])->name('precontratos.registrar');
// web.php
Route::get('/contratos/verificar/{id_precontrato}', [ContratoController::class, 'verificarContrato']);


//Route::post('/contratos/crear/{id_cliente}', [ContratoController::class, 'crearContrato']);
Route::post('/contratos/crear/{id_cliente}', [ContratoController::class, 'crearContrato'])->name('contratos.crear');


// Ruta para descargar el contrato en PDF (GET)
Route::get('/contratos/pdf/{id_precontrato}', [ContratoController::class, 'generarContratoPDF'])->name('contratos.pdf');

Route::get('/gestion', function () {return view('gestionContratos');});



Route::get('/gestionContrato/{id}', [ContratoController::class, 'show'])->name('gestionContrato.show');

Route::put('/contratos/{id}/estado', [ContratoController::class, 'updateEstado'])->name('contratos.updateEstado');

Route::get('/contratos/{id}/pagos', [ContratoController::class, 'mostrarCalendarioPagos'])->name('contrato.pagos');
Route::get('/user/preguntas', [UserController::class, 'index'])->name('preguntas');

Route::get('/pagos/{id_pago}/ticket', [ContratoController::class, 'generarTicket'])->name('pagos.ticket');


Route::post('/respuesta/mensaje', [ContactoController::class, 'enviarRespuesta'])->name('respuesta.mensaje');

// rutas para el modulo faq
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('/faq/{id}/edit', [FaqController::class, 'edit'])->name('faq.edit');
Route::delete('/faq/{id}', [FaqController::class, 'destroy'])->name('faq.destroy');
Route::put('/faq/{id}', [FaqController::class, 'update'])->name('faq.update');

Route::post('/verificar-pagos', [PagosController::class, 'verificarPagosYContratos'])->name('verificar.pagos');

//tickets
Route::get('/tickets', [TicketsController::class, 'mostrarTickets'])->name('mostrar.tickets');
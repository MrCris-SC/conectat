<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="author" content="">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="{{ asset('css/packs.css') }}" rel="stylesheet">
    <title>Lista de Clientes</title>

    <!-- Custom fonts for this template-->
        <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
<div id="wrapper">
   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
             <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                     <i class="fas fa-globe"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Admin Panel</div>
             </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Gestion de paquetes:
            </div>
           
            <!-- Nav Item - Paquetes -->
            <li class="nav-item">
                <a class="nav-link" href="{{url ('/')}}">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Gestión de Paquetes</span></a>
            </li>

            <!-- Nav Item - Clientes -->
            <li class="nav-item">
                <a class="nav-link" href="{{url ('/clienteRegistrados')}}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Gestión de Clientes</span></a>
            </li>

            <!-- Nav Item - Clientes -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/indexAdmin') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Gestión de Administradores</span></a>
            </li>

            <!-- Nav Item - Facturación -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('mostrar.contratos') }}">
                    <i class="fas fa-fw fa-file-invoice-dollar"></i>
                    <span>Contratos</span></a>
            </li>

            <!-- Nav Item - Reportes -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/tickets')}}">
                    <i class="fas fa-fw fa-chart-line"></i>
                    <span>Reportes</span></a>
            </li>

            

            <!-- Nav Item - Ajustes -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/precontratos') }}">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Precontratos</span></a>
            </li>

            <!-- Nav Item - Ayuda -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/faq')}}">
                    <i class="fas fa-fw fa-question-circle"></i>
                    <span>FAQ</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
        <div class="container-fluid">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>
                              <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">Message Center</h6>

                                @foreach ($mensajes as $mensaje)
                                    <a 
                                        class="dropdown-item d-flex align-items-center" 
                                        href="#"
                                        data-toggle="modal" 
                                        data-target="#mensajeModal"
                                        data-nombre="{{ $mensaje->nombre }}"
                                        data-fecha="{{ $mensaje->created_at->diffForHumans() }}"
                                        data-mensaje="{{ $mensaje->mensaje }}"
                                        data-correo="{{ $mensaje->correo_mensaje }}"
                                    >
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                            <div class="status-indicator bg-success"></div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">{{ $mensaje->mensaje }}</div>
                                            <div class="small text-gray-500">{{ $mensaje->nombre }} · {{ $mensaje->created_at->diffForHumans() }}</div>
                                        </div>
                                    </a>
                                @endforeach

                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>


                            <!-- Modal -->
                            <div class="modal fade" id="mensajeModal" tabindex="-1" role="dialog" aria-labelledby="mensajeModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="mensajeModalLabel">Detalles del Mensaje</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Nombre: </strong><span id="modalNombre"></span></p>
                                            <p><strong>Correo: </strong><span id="modalCorreo"></span></p> <!-- Agregado para correo -->
                                            <p><strong>Mensaje: </strong></p>
                                            <p id="modalMensaje"></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </li>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    {{ session('nombreAdmin') ?? auth()->guard('admin')->user()->nombre }}
                                </span>
                                <img class="img-profile rounded-circle" src="{{ asset('images/admin.jpeg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesion
                                </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                 
                <div class="card shadow mb-4" > 
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Precontratos Existentes</h6>
                        </div>
                         <!-- Apartado que se necesita hacerse responsivo -->
                        <div class="card-body">
                            <div class="table-responsive" >

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Cliente</th>
                                        <th>Dirección</th>
                                        <th>Paquete</th>
                                        <th>Es cliente</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($precontratos as $precontrato)
                                        <tr>
                                            <td>{{ $precontrato->id_precontrato }}</td>
                                            <td>{{ $precontrato->cliente->id_cliente ?? 'Sin Cliente' }}-{{ $precontrato->cliente->nombre_completo ?? 'Sin Cliente' }}</td>
                                            <td>{{ $precontrato->direccion->calle ?? 'Sin Dirección' }}</td>
                                            <td>{{ $precontrato->paquete->id_nombre_paquete ?? '' }}-{{ $precontrato->paquete->nombre_paquete ?? 'Sin Paquete' }}</td> 
                                            <!--<td>{{ $precontrato->cliente->es_cliente ?? 'No es Cliente'}} </td> -->
                                            <td>{{ $precontrato->cliente->es_cliente == 1 ? 'Sí' : 'No' }}</td>                                       
                                            <td>

                                                <!-- Botón para abrir el modal de cambiar paquete -->
                                                <button type="button" class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#cambiarPaqueteModal-{{ $precontrato->id_precontrato }}">
                                                    <span class="icon text-white-50">
                                                    <i class="fas fa-edit"></i>
                                                    </span>
                                                    <span class="text">Cambiar Paquete</span>
                                                </button>     
                                                <!-- Modal para cambiar paquete -->
                                                <div class="modal fade" id="cambiarPaqueteModal-{{ $precontrato->id_precontrato }}" tabindex="-1" role="dialog" aria-labelledby="cambiarPaqueteLabel-{{ $precontrato->id_precontrato }}" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form action="{{ route('precontrato.cambiarPaquete', $precontrato->id_precontrato) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="cambiarPaqueteLabel-{{ $precontrato->id_precontrato }}">Cambiar Paquete</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label for="fk_paquete-{{ $precontrato->id_precontrato }}" class="form-label">Seleccionar Paquete</label>
                                                                            <select class="form-control" id="fk_paquete-{{ $precontrato->id_precontrato }}" name="fk_paquete" required>
                                                                            @foreach ($paquetes as $paquete)
                                                                                <option value="{{ $paquete->id_nombre_paquete }}" 
                                                                                    {{ $precontrato->paquete->id_nombre_paquete == $paquete->id_nombre_paquete ? 'selected' : '' }}>
                                                                                    {{ $paquete->id_nombre_paquete }} - {{ $paquete->nombre_paquete }}
                                                                                </option>
                                                                            @endforeach
                                                                            </select>
                                                                        </div>
                                                                            <!-- Selección de Estado de Cliente en caso de usar eliminar no afecta funcionamiento 
                                                                        <div class="mb-3">
                                                                            <label for="es_cliente-{{ $precontrato->id_precontrato }}" class="form-label">¿Es Cliente?</label>
                                                                                <select class="form-control" id="es_cliente-{{ $precontrato->id_precontrato }}" name="es_cliente" required>
                                                                                    <option value="1" {{ $precontrato->cliente->es_cliente == 1 ? 'selected' : '' }}>Sí</option>
                                                                                    <option value="0" {{ $precontrato->cliente->es_cliente == 0 ? 'selected' : '' }}>No</option>
                                                                                </select>
                                                                        </div>-->
                                                                    </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                                        </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Botón de Contratos -->
                                                        
                                                <a href="javascript:void(0);" class="btn btn-info btn-icon-split" onclick="mostrarModalContrato({{ $precontrato->cliente->id_cliente }}, {{ $precontrato->cliente->es_cliente }}, {{ $precontrato->id_precontrato }})">
                                                        <span class="icon text-white-50">
                                                                <i class="fas fa-file-contract"></i>
                                                            </span>
                                                            <span class="text">Contratos</span>
                                                </a>

                                                <!-- Modal Cliente ya tiene contrato -->
                                                <div class="modal fade" id="modalClienteContrato" tabindex="-1" aria-labelledby="modalConfirmacionLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalConfirmacionLabel">Contrato no disponible</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Este cliente ya tiene un contrato
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Modal Confirmación de Creación de Contrato -->
                                                <div class="modal fade" id="modalConfirmacionContrato" tabindex="-1" aria-labelledby="modalConfirmacionLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalConfirmacionLabel">Confirmar Creación de Contrato</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                            </div>
                                                           
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="fechaInicioContrato">Fecha de inicio</label>
                                                                    <input type="date" class="form-control" id="fechaInicioContrato" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="duracionContrato">Duración del contrato</label>
                                                                    <select class="form-control" id="duracionContrato">
                                                                        <option value="6">6 meses</option>
                                                                        <option value="12">1 año</option>
                                                                        <option value="18">1 año y medio</option>
                                                                        <option value="24">2 años</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="fechaFinContrato">Fecha de fin</label>
                                                                    <input type="text" class="form-control" id="fechaFinContrato" readonly>
                                                                </div>
                                                                ¿Está seguro de que desea crear un contrato para este cliente?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                <button type="button" class="btn btn-primary" id="confirmarContratoBtn">Crear Contrato</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                            
                                            </td>
                                        </tr>
                                            @empty
                                        <tr>
                                            <td colspan="10" class="text-center">No hay precontratos.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>    
                        </div>             
                </div>
            </div>
        </div>

        

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
    </div>

        <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Listo para irte?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesion</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Agrega los datos de paquetes en un elemento de script para usarlo en JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Convertir los datos de los paquetes a un objeto JSON
            const paquetes = @json($paquetes);

            // Iteramos sobre cada 'select' de paquetes en cada modal (en caso de que haya varios)
            document.querySelectorAll('.form-control[id^="fk_paquete-"]').forEach(selectPaquete => {
                selectPaquete.addEventListener('change', function() {
                    // Obtener el ID del paquete seleccionado
                    const selectedId = this.value;

                    // Buscar el paquete seleccionado en el objeto `paquetes`
                    const paquete = paquetes.find(p => p.id_nombre_paquete == selectedId);
                    // Actualizar el campo "Datos_Paquete" con los detalles del paquete seleccionado
                    const datosPaqueteInput = document.getElementById('Datos_Paquete-' + this.id.split('-')[1]);
                    if (paquete && datosPaqueteInput) {
                        // Actualizamos el contenido del textarea con los datos del paquete
                        datosPaqueteInput.value = `Paquete: ${paquete.nombre_paquete}\nPrecio: $${paquete.precio}\nCaracterísticas: ${paquete.caracteristicas_paquete}\nVelocidad: ${paquete.velocidad_paquete}`;
                    }
                });
            });
        });
    </script>

    <script>
        let idClienteContrato = null;
        let idprecontratos = null;

        function mostrarModalContrato(idCliente, esCliente, idPrecontrato) {
            // Asignar los valores de los parámetros
            idClienteContrato = idCliente;
            idprecontratos = idPrecontrato;

            // Obtener todos los contratos desde el backend
            const contratos = @json($contratos);  // Aquí debes asegurarte de pasar la variable correctamente desde Blade
            const contrato = contratos.find(p => p.fk_precontrato === idPrecontrato);

            // Verificar si el cliente ya tiene un contrato
            if (contrato) {
                // Si ya tiene contrato, mostrar el modal de error
                var modalContrato = new bootstrap.Modal(document.getElementById('modalClienteContrato'));
                modalContrato.show();
            } else {
                // Si no tiene contrato, mostrar el modal de confirmación
                var modalConfirmacion = new bootstrap.Modal(document.getElementById('modalConfirmacionContrato'));
                modalConfirmacion.show();
            }
        }

        // Función para calcular la fecha de finalización del contrato
        function calcularFechaFin() {
            const fechaInicio = document.getElementById('fechaInicioContrato').value;
            const duracion = document.getElementById('duracionContrato').value;

            if (fechaInicio && duracion) {
                const fecha = new Date(fechaInicio);
                fecha.setMonth(fecha.getMonth() + parseInt(duracion)); // Añadir los meses de duración

                // Formatear la fecha de fin como dd/mm/yyyy
                const fechaFin = `${fecha.getDate().toString().padStart(2, '0')}/${(fecha.getMonth() + 1).toString().padStart(2, '0')}/${fecha.getFullYear()}`;
                document.getElementById('fechaFinContrato').value = fechaFin;
            }
        }
        // Event Listener para actualizar la fecha de fin cuando la fecha de inicio o la duración cambian
        document.getElementById('fechaInicioContrato').addEventListener('change', calcularFechaFin);
        document.getElementById('duracionContrato').addEventListener('change', calcularFechaFin);


        /// Función para crear el contrato usando fetch
        function crearContrato(idCliente) {

            const fechaInicio = document.getElementById('fechaInicioContrato').value;
            const duracion = document.getElementById('duracionContrato').value;
            const fechaFin = document.getElementById('fechaFinContrato').value;

            //let fechaFin = document.getElementById('fechaFin').value; // Asume que es DD/MM/YYYY
            let fechaFinCorrecta = fechaFin.split('/').reverse().join('-'); // Convierte a YYYY-MM-DD

            //console.log(idCliente)
            //console.log(idprecontratos)
            // Ahora puedes enviar la fecha de esta manera
            //console.log(fechaInicio, fechaFin); // Verifica el resultado
            if (!fechaInicio || !duracion || !fechaFin) {
                alert('Por favor, completa todos los campos.');
                return;
            }
            const url = `/contratos/crear/${idCliente}`;

            fetch(url, {
                method: 'POST',
                headers: {
               'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id_cliente: idCliente,
                fecha_inicio: fechaInicio,
                fecha_fin: fechaFinCorrecta,
                id_precontrato: idprecontratos
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Si la creación es exitosa, proceder con la descarga del PDF
                //descargarPDF(data.id_cliente);
                descargarPDF(idprecontratos); // Cambiar de `data.id_cliente` a `data.id_precontrato`

                
            } else {
                console.error(data.message);
                alert('Error al crear el contrato: ' + data.message);
            }
            location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al procesar la solicitud: ' + error.message);
        });
        }

        // Función para descargar el PDF del contrato
        function descargarPDF(idPrecontrato) {
            const url = `/contratos/pdf/${idPrecontrato}`;
            console.log(url);
            const link = document.createElement('a');
            link.href = url;
            link.target = '_blank';
            link.click();
        }

        // Event Listener para confirmar la creación del contrato
        document.getElementById('confirmarContratoBtn').addEventListener('click', function () {
            if (idClienteContrato) {
                // Llamamos a la función para crear el contrato
                crearContrato(idClienteContrato);
                
            } else {
                alert('No se ha seleccionado un cliente.');
            }
        });
    </script>


    <!-- Bootstrap core JavaScript--> 
    <!-- Vendor Scripts -->

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript -->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages -->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>   

</body>
</html>

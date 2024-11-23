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
        <a class="nav-link" href="{{url('clienteRegistrados')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>Gestión de Clientes</span></a>
    </li>

      <!-- Nav Item - Clientes -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/indexAdmin') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Gestión de Adminisreadores</span></a>
    </li>
        <!-- Nav Item - Facturación -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('mostrar.contratos') }}">
            <i class="fas fa-fw fa-file-invoice-dollar"></i>
            <span>Contratos</span></a>
    </li>

    <!-- Nav Item - Reportes -->
    <li class="nav-item">
        <a class="nav-link" href="reportes.html">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Reportes</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Configuración
    </div>

    <!-- Nav Item - Ajustes -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/precontratos') }}">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Precontratos</span></a>
    </li>

    <!-- Nav Item - Ayuda -->
    <li class="nav-item">
        <a class="nav-link" href="ayuda.html">
            <i class="fas fa-fw fa-question-circle"></i>
            <span>Ayuda</span></a>
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
                            <h6 class="m-0 font-weight-bold text-primary">Clientes Registrados</h6>
                        </div>
                         <!-- Apartado que se necesita hacerse responsivo -->
                        <div class="card-body">
                                <div class="table-responsive" >

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre Completo</th>
                                            <th>Correo</th>
                                            <th>Teléfono</th>
                                            <th>Código Postal</th>
                                            <th>Municipio</th>
                                            <th>Dirección</th>
                                            <th>Referencia de Domicilio</th>                                           
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($clientes as $precontrato)
                                        <tr>
                                            <td>{{ $precontrato->cliente->id_cliente ?? 'N/A' }}</td>
                                            <td>{{ $precontrato->cliente->nombre_completo ?? 'N/A' }}</td>
                                            <td>{{ $precontrato->cliente->correo_electronico ?? 'N/A' }}</td>
                                            <td>{{ $precontrato->cliente->telefono ?? 'N/A' }}</td>
                                            <td>{{ $precontrato->direccion->codigo_postal ?? 'N/A' }}</td>
                                            <td>{{ $precontrato->direccion->localidad ?? 'N/A' }}</td>
                                            <td>{{ $precontrato->direccion->calle ?? 'N/A' }}</td>
                                            <td>{{ $precontrato->direccion->referencia_domicilio ?? 'N/A' }}</td>                                            
                                            <td>
                                                    <!-- Botón de Administrar -->
                                                    <a href="{{ route('cliente.edit', $precontrato->cliente->id_cliente) }}" class="btn btn-info btn-icon-split" style="width: 150px; display: inline-block;">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-edit"></i>
                                                        </span>
                                                        <span class="text">Administrar</span>
                                                    </a>
                                                    <!-- Modal para Contratos -->
                                                        <div class="modal fade" id="contratoModal-{{ $precontrato->cliente->id_cliente }}" tabindex="-1" role="dialog" aria-labelledby="contratoModalLabel-{{ $precontrato->cliente->id_cliente }}" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="contratoModalLabel-{{ $precontrato->cliente->id_cliente }}">¿Desea crear y descargar el contrato?</h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <span id="nombreClienteModal-{{ $precontrato->cliente->id_cliente }}"></span>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                                                        <button class="btn btn-primary" onclick="crearContratoYDescargarPDF({{ $precontrato->cliente->id_cliente }})" data-dismiss="modal">Confirmar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <p></p>

                                                    <!-- Botón de Contratos 
                                                    <a href="javascript:void(0);" onclick="abrirContratoModal({{ $precontrato->cliente->id_cliente }}, '{{ $precontrato->cliente->nombre_completo }}');" class="btn btn-info btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-file-contract"></i>
                                                        </span>
                                                        <span class="text">Contratos</span>
                                                    </a>-->
                                                    <p></p>

                                                    <form id="deleteForm-{{ $precontrato->cliente->id_cliente }}" action="{{ route('cliente.destroy',  $precontrato->cliente->id_cliente) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    
                                                        <button type="button" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteModal-{{ $precontrato->cliente->id_cliente }}">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-trash"></i>
                                                            </span>
                                                            <span class="text">Eliminar</span>
                                                        </button>
                                                    </form>
                                                    
                                                    <div class="modal fade" id="deleteModal-{{  $precontrato->cliente->id_cliente }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-{{  $precontrato->cliente->id_cliente }}" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteModalLabel-{{  $precontrato->cliente->id_cliente }}">Confirmar Eliminación</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    ¿Estás seguro de que deseas eliminar el cliente <strong>{{  $precontrato->cliente->id_cliente }}</strong>?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                    <button type="button" class="btn btn-danger" onclick="document.getElementById('deleteForm-{{  $precontrato->cliente->id_cliente}}').submit();">Eliminar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10" class="text-center">No hay clientes registrados.</td>
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

 <!-- Modal para Contratos -->
    <div class="modal fade" id="contratoModal-{{ $precontrato->cliente->id_cliente }}" tabindex="-1" role="dialog" aria-labelledby="contratoModalLabel-{{ $precontrato->cliente->id_cliente }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contratoModalLabel-{{ $precontrato->cliente->id_cliente }}">¿Desea crear y descargar el contrato?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Seleccione "Confirmar" para generar y descargar el contrato en PDF para <span id="nombreClienteModal-{{ $precontrato->cliente->id_cliente }}"></span>.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" onclick="crearContratoYDescargarPDF({{ $precontrato->cliente->id_cliente }})" data-dismiss="modal">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <script>

        let clienteIdSeleccionado = null;
        let nombre_cliente = null;

        // Función para abrir el modal y mostrar el nombre del cliente
        function abrirContratoModal(idCliente, nombre) {
            clienteIdSeleccionado = idCliente;
            nombre_cliente = nombre;

            // Actualiza el contenido del mensaje del modal con el ID del cliente
            document.getElementById(`nombreClienteModal-${idCliente}`).textContent = 
                `Seleccione "Confirmar" para generar y descargar el contrato en PDF para el cliente seleccionado: ${nombre_cliente} con el ID ${clienteIdSeleccionado}.`;

            // Muestra el modal correspondiente al cliente
            $(`#contratoModal-${idCliente}`).modal('show');
        }

        // Función para crear y descargar el contrato en PDF
        function crearContratoYDescargarPDF(clienteId) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Realiza la solicitud POST para generar el contrato
            fetch(`/cliente/${clienteId}/contrato`, {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({}) // Cuerpo vacío, puedes agregar parámetros si es necesario
            })
            .then(response => {
                if (response.ok) {
                    // Si la respuesta es exitosa, abre el PDF en una nueva ventana
                    window.open(`/cliente/${clienteId}/contrato`, '_blank');
                    // Oculta el modal correspondiente
                    $(`#contratoModal-${clienteId}`).modal('hide');
                } else {
                    console.error("Error al insertar el contrato:", response);
                }
            })
            .catch(error => console.error("Error en la solicitud:", error));
        }

       
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

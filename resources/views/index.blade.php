<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
   
    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    

</head>

<body id="page-top">

    <!-- Page Wrapper -->
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
                <a class="nav-link" href="clienteRegistrados">
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
                <a class="nav-link" href="ajustes.html">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Ajustes del Sistema</span></a>
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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div>
                    <h1 class="h3 mb-2 text-gray-800">Paquetes existentes</h1>
                    </div>
                    <div class="div-new">
                        <p>Agregar nuevo Paquete</p>
                        <a href="{{ url('/agregar-paquete') }}" class="btn btn-info btn-icon-split btn-new" >
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                        <span class="text">Nuevo</span>
                        </a>
                    </div>
                    
                    <br>


                    <!-- DataTales Example -->
                    <section class="page-section" id="portfolio">
                        <div class="container">
                            <div class="row">
                                <!-- Aquí recorremos los paquetes y generamos el HTML dinámicamente -->
                                @foreach($paquetes as $paquete)
                                    <div class="col-md-4">
                                        <div class="card mb-4 py-3 border-left-danger">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $paquete->nombre_paquete }}</h5>
                                                <p class="card-text">{{ $paquete->tipo_paquete }}</p>
                                                <p class="card-text">Velocidad: {{ $paquete->velocidad_paquete }}</p>
                                                <p class="card-text">Características: {{ $paquete->caracteristicas_paquete }}</p>
                                                <p class="card-text">Precio: ${{ $paquete->precio }}</p>
                                                @if($paquete->promocion)
                                                    <p><strong>Promoción:</strong> {{ $paquete->promocion->promocion }}%</p>
                                                @endif
                                                    
                                                <a href="{{ route('paquete.edit', $paquete->id_nombre_paquete) }}" 
                                                    class="btn btn-info btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                    <span class="text">Editar</span>
                                                </a>
                                                <p></p>
                                                
                                                {{-- <p></p> --}}
                                                {{-- <form action="{{ route('paquete.destroy', 
                                                    $paquete->id_nombre_paquete) }}" 
                                                    method="POST" onsubmit="return 
                                                    confirm('¿Estás seguro de que deseas eliminar este paquete?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    
                                                    <button type="submit" class="btn btn-danger btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-trash"></i>
                                                        </span>
                                                        <span class="text">Eliminar</span>
                                                    </button>
                                                </form> --}}
                                                <form id="deleteForm-{{ $paquete->id_nombre_paquete }}" action="{{ route('paquete.destroy', $paquete->id_nombre_paquete) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                
                                                    <button type="button" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteModal-{{ $paquete->id_nombre_paquete }}">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-trash"></i>
                                                        </span>
                                                        <span class="text">Eliminar</span>
                                                    </button>
                                                </form>
                                                <div class="modal fade" id="deleteModal-{{ $paquete->id_nombre_paquete }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-{{ $paquete->id_nombre_paquete }}" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel-{{ $paquete->id_nombre_paquete }}">Confirmar Eliminación</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                ¿Estás seguro de que deseas eliminar el paquete <strong>{{ $paquete->nombre_paquete }}</strong>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                <button type="button" class="btn btn-danger" onclick="document.getElementById('deleteForm-{{ $paquete->id_nombre_paquete }}').submit();">Eliminar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>                                                 
                    </section>



                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

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
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>

    <!-- Script del Modal -->
    <script>
        // Asegúrate de que jQuery y Bootstrap estén cargados antes de este script
        $('#mensajeModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Botón que activó el modal
            var nombre = button.data('nombre'); // Extrae la información de los atributos data-*
            var fecha = button.data('fecha');
            var mensaje = button.data('mensaje');
            var correo = button.data('correo'); // Extrae el correo

            // Actualiza el contenido del modal
            var modal = $(this);
            modal.find('#modalNombre').text(nombre);
            modal.find('#modalCorreo').text(correo); // Asigna el correo
            modal.find('#modalMensaje').text(mensaje);
        });
    </script>
    
</body>

</html>
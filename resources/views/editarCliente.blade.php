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
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="{{ asset('css/packs.css') }}" rel="stylesheet">
    <title>Editar de Clientes</title>

    <!-- Custom fonts for this template-->
        <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    
    <script>
        // Espera que el DOM esté completamente cargado
        document.addEventListener('DOMContentLoaded', function() {
            // Selecciona el botón y los campos del formulario
            const btnEditar = document.getElementById('btnEditar');
            const campos = document.querySelectorAll('#formEditarCliente input, #formEditarCliente select');
            const btnGuardar = document.getElementById('btnGuardar');
            
            campos.forEach(campo => {
                campo.disabled = true;
            });

            // Asegura que el botón "Guardar Cambios" esté oculto al cargar la página
            btnGuardar.style.display = 'none';

            // Añade un evento click al botón
            btnEditar.addEventListener('click', function() {
                // Recorre cada campo y habilítalo
                campos.forEach(campo => {
                    campo.disabled = false;
                });
                // Oculta el botón "Editar" y muestra el botón "Guardar Cambios"
                btnEditar.style.display = 'none';
                btnGuardar.style.display = 'block';
            });
        });
    </script>
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
        <a class="nav-link" href="{{ url('/clienteRegistrados') }}">
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
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

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
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
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
    <div class="container mt-5">
        <h2>Editar Cliente</h2>
        <form method="POST" id="formEditarCliente" action="{{ route('cliente.update', $cliente->id_cliente) }}" >
            @csrf
            @method('PUT')

                <div class="mb-3">
                    <label for="nombre_completo" class="form-label">Nombre Completo</label>
                    <input type="text" class="form-control" name="nombre_completo" value="{{ $cliente->nombre_completo }}" required>
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" name="correo_electronico" value="{{ $cliente->correo_electronico }}" required>
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" maxlength="10" value="{{ $cliente->telefono }}" required>
                </div>

               

                <!-- Modifique seleccion de ip de paquete y actualizacion de manera automatica los datos del pquete -->
                <!-- <div class="mb-3">
                    <label for="fk_paquete" class="form-label">ID del Paquete y Nombre</label>
                    <select class="form-control"id="fk_paquete" name="fk_paquete" required>
                        @foreach ($paquetes as $paquete)
                            <option value="{{ $paquete->id_nombre_paquete }}" 
                                {{ $cliente->fk_paquete == $paquete->id_nombre_paquete ? 'selected' : '' }}>
                                {{ $paquete->id_nombre_paquete }}-{{ $paquete->nombre_paquete }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="Datos_Paquete" class="form-label">Datos del paquete</label>
                    <input type="text" class="form-control" id="Datos_Paquete" name="Datos_Paquete" 
                        value="Paquete: {{ $cliente->nombrepaquete->nombre_paquete }} de $:{{ $cliente->nombrepaquete->precio }} incluye:{{ $cliente->nombrepaquete->caracteristicas_paquete }} velocidad:{{ $cliente->nombrepaquete->velocidad_paquete }}" required> 
                </div>
                -->         
                <button type="submit" class="btn btn-primary" id="btnGuardar" style="display: none;">Guardar Cambios</button>
                <br>

                <button type="button" class="btn btn-primary" id="btnEditar">Modificar campos</button>
       
                <a href="{{ route('clientes') }}" class="btn btn-secondary">Cancelar</a>

                <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#editAddressModal-{{ $cliente->id_cliente }}">
    <span class="icon text-white-50">
        <i class="fas fa-edit"></i>
    </span>
    <span class="text">Editar Dirección</span>
</button>

<div class="modal fade" id="editAddressModal-{{ $cliente->id_cliente }}" tabindex="-1" role="dialog" aria-labelledby="editAddressModalLabel-{{ $cliente->id_cliente }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Header del modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="editAddressModalLabel-{{ $cliente->id_cliente }}">Agregar Dirección</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Cuerpo del modal -->
            <div class="modal-body">
                <form id="addAddressForm-{{ $cliente->id_cliente }}" action="{{ route('direccion.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="fk_cliente" value="{{ $cliente->id_cliente }}">
                    
                    <!-- Campos de dirección -->
                    <div class="form-group">
                        <label for="calle-{{ $cliente->id_cliente }}">Calle</label>
                        <input type="text" class="form-control" id="calle-{{ $cliente->id_cliente }}" name="calle">
                    </div>
                    <div class="form-group">
                        <label for="colonia-{{ $cliente->id_cliente }}">Colonia</label>
                        <input type="text" class="form-control" id="colonia-{{ $cliente->id_cliente }}" name="colonia">
                    </div>
                    <div class="form-group">
                        <label for="localidad-{{ $cliente->id_cliente }}">Localidad</label>
                        <input type="text" class="form-control" id="localidad-{{ $cliente->id_cliente }}" name="localidad">
                    </div>
                    <div class="form-group">
                        <label for="estado-{{ $cliente->id_cliente }}">Entidad Federativa</label>
                        <input type="text" class="form-control" id="estado-{{ $cliente->id_cliente }}" name="estado">
                    </div>
                    <div class="form-group">
                        <label for="codigo_postal-{{ $cliente->id_cliente }}">Código Postal</label>
                        <input type="text" class="form-control" id="codigo_postal-{{ $cliente->id_cliente }}" name="codigo_postal">
                    </div>
                    <div class="form-group">
                        <label for="referencias-{{ $cliente->id_cliente }}">Referencias</label>
                        <input type="text" class="form-control" id="referencias-{{ $cliente->id_cliente }}" name="referencias">
                    </div>

                    <!-- Botón Guardar -->
                    <button type="submit" id="saveButton-{{ $cliente->id_cliente }}" class="btn btn-success">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
            <p></p>



        <section class="direcciones">
            <h3>Direcciones Asociadas</h3>
            @if ($cliente->direcciones->isEmpty())
                <p>No hay direcciones registradas para este cliente.</p>
            @else
                <ul class="list-group">
                    @foreach ($cliente->direcciones as $direccion)
                        <li class="list-group-item">
                            <strong>Calle:</strong> {{ $direccion->calle }}<br>
                            <strong>Colonia:</strong> {{ $direccion->colonia }}<br>
                            <strong>Localidad:</strong> {{ $direccion->localidad }}<br>
                            <strong>Estado:</strong> {{ $direccion->entidad_federativa }}<br>
                            <strong>Código Postal:</strong> {{ $direccion->codigo_postal }}<br>
                            <strong>Referencias:</strong> {{ $direccion->referencia_domicilio }}
                        </li>
                    @endforeach
                </ul>
            @endif
        </section>

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
    </div>
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
    </div>

    <!-- Agrega los datos de paquetes en un elemento de script para usarlo en JavaScript -->
<script>
    // Convertir los datos de los paquetes a un objeto JSON
    const paquetes = @json($paquetes);

    document.getElementById('fk_paquete').addEventListener('change', function() {
        // Obtener el ID de paquete seleccionado
        const selectedId = this.value;
        
        // Buscar el paquete seleccionado en el objeto `paquetes`
        const paquete = paquetes.find(p => p.id_nombre_paquete == selectedId);
        
        // Actualizar el campo "Datos_Paquete" con los detalles del paquete seleccionado
        if (paquete) {
            document.getElementById('Datos_Paquete').value = `Paquete: ${paquete.nombre_paquete} de $:${paquete.precio} incluye:${paquete.caracteristicas_paquete} velocidad:${paquete.velocidad_paquete}`;
        }
    });
    
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
</body>
</html>
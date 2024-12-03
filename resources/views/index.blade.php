@extends('plantilla')

@section('content')
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

                                            <p><strong>Nombre: </strong><span id="modalNombre"></span></p>
                                            <p><strong>Correo: </strong><span id="modalCorreo"></span></p> <!-- Agregado para correo -->
                                            <p><strong>Mensaje: </strong></p>
                                            <p id="modalMensaje"></p>
                                              <!-- Formulario para responder -->
                                            <form id="respuestaForm" method="POST" action="{{ route('respuesta.mensaje') }}">
                                                @csrf
                                                <input type="hidden" id="correoRespuesta" name="correo" value="">
                                                <div class="form-group">
                                                    <label for="respuesta">Tu Respuesta:</label>
                                                    <textarea class="form-control" id="respuesta" name="respuesta" rows="3" required></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Enviar Respuesta</button>
                                            </form>

                                            ¿Estás seguro de que deseas eliminar el paquete <strong>{{ $paquete->nombre_paquete }}</strong>?

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-danger" onclick="document.getElementById('deleteForm-{{ $paquete->id_nombre_paquete }}').submit();">Eliminar</button>
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

                    </div>
                </div>
            @endforeach

        </div>
    </div>                                                 
</section>



            // Actualiza el contenido del modal
            var modal = $(this);
            modal.find('#modalNombre').text(nombre);
            modal.find('#modalCorreo').text(correo); // Asigna el correo
            modal.find('#modalMensaje').text(mensaje);
            $('#correoRespuesta').val(correo);
        });
    </script>
    
    
</body>


</div>
<!-- /.container-fluid -->
@endsection
     
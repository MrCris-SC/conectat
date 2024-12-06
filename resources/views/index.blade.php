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
    <div class="div-new">
        <p>Actualizar el estado de los pagos y contratos</p>
        <form action="{{ route('verificar.pagos') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-warning">Verificar Pagos y Contratos</button>
        </form>
    </div>
<br>
<!-- DataTales Example -->
    <section class="page-section" id="portfolio">
        <div class="container">
            <div class="row">
                @foreach($paquetes as $paquete)
                    <!-- Contenedor de cada paquete -->
                    <div class="col-md-4">
                        <div class="card mb-4 py-3 border-left-danger">
                            <div class="card-body">
                                <!-- Información del paquete -->
                                <h5 class="card-title">{{ $paquete->nombre_paquete }}</h5>
                                <p class="card-text">{{ $paquete->tipo_paquete }}</p>
                                <p class="card-text">Velocidad: {{ $paquete->velocidad_paquete }}</p>
                                <p class="card-text">Características: {{ $paquete->caracteristicas_paquete }}</p>
                                <p class="card-text">Precio: ${{ $paquete->precio }}</p>
                                @if($paquete->promocion)
                                    <p><strong>Promoción:</strong> {{ $paquete->promocion->promocion }}%</p>
                                @endif

                                <!-- Botones de acciones -->
                                <a href="{{ route('paquete.edit', $paquete->id_nombre_paquete) }}" 
                                class="btn btn-info btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    <span class="text">Editar</span>
                                </a>
                                <br><br>
                                
                                <!-- Botón y modal para eliminar -->
                                <form id="deleteForm-{{ $paquete->id_nombre_paquete }}" 
                                    action="{{ route('paquete.destroy', $paquete->id_nombre_paquete) }}" 
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-icon-split" data-toggle="modal" 
                                            data-target="#deleteModal-{{ $paquete->id_nombre_paquete }}">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Eliminar</span>
                                    </button>
                                </form>

                                <!-- Modal de confirmación de eliminación -->
                                <div class="modal fade" id="deleteModal-{{ $paquete->id_nombre_paquete }}" tabindex="-1" 
                                    role="dialog" aria-labelledby="deleteModalLabel-{{ $paquete->id_nombre_paquete }}" 
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel-{{ $paquete->id_nombre_paquete }}">
                                                    Confirmar Eliminación
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Estás seguro de que deseas eliminar este paquete?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-danger" 
                                                        onclick="document.getElementById('deleteForm-{{ $paquete->id_nombre_paquete }}').submit();">
                                                    Eliminar
                                                </button>
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
    <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="toastMessage" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Notificación</strong>
                    <small>Justo ahora</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body" id="toastBody">
                    <!-- El mensaje se inserta aquí -->
                </div>
            </div>
        </div>
</div>
    <script>
            // Actualiza el contenido del modal
            var modal = $(this);
            modal.find('#modalNombre').text(nombre);
            modal.find('#modalCorreo').text(correo); // Asigna el correo
            modal.find('#modalMensaje').text(mensaje);
            $('#correoRespuesta').val(correo);
        });
    </script>
<!-- /.container-fluid -->
@endsection
     
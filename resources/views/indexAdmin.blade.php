@extends('plantilla')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
    <div>
    <h1 class="h3 mb-2 text-gray-800">Administradores Existentes</h1>
    </div>

    <div class="div-new">
        <p>Agregar nuevo administrador</p>
        <a href="{{ url('/adminRegister') }}" class="btn btn-info btn-icon-split btn-new" >
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
        <span class="text">Nuevo</span>
        </a>
    </div>

    <br>

    <section class="page-section" id="portfolio">
        <div class="container">
            <div class="row">
                <!-- Aquí recorremos los paquetes y generamos el HTML dinámicamente -->
                @foreach($administradores as $admin)
                    <div class="col-md-4">
                        <div class="card mb-4 py-3 border-left-danger">
                            <div class="card-body">
                                <h5 class="card-text">id:{{  $admin->id_admin }}</h5>
                                <p class="card-text">Nombre: {{ $admin->nombre  }}</p>
                                <p class="card-text">Correo: {{ $admin->correo_electronico  }}</p>
                                <p class="card-text">Contraseña: {{  $admin->password }}</p>
                                <p class="card-text">Rol: {{  $admin->permisos }}</p>
                                    
                                <a href="{{ route('admin.edit', $admin->id_admin) }}" class="btn btn-info btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    <span class="text">Editar</span>
                                </a>
                                <p></p>
                                <!-- Botón para abrir el modal -->
                                <button type="button" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#confirmDeleteModal-{{ $admin->id_admin }}">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">Eliminar</span>
                                </button>

                                <!-- Modal de confirmación -->
                                <div class="modal fade" id="confirmDeleteModal-{{ $admin->id_admin }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Estás seguro de que deseas eliminar a este Administrador?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <!-- Formulario para confirmar eliminación -->
                                                <form action="{{ route('admin.destroy', $admin->id_admin) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
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
@endsection 
@extends('plantilla')

@section('content')

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
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id_cliente }}</td>
                            <td>{{ $cliente->nombre_completo }}</td>
                            <td>{{ $cliente->correo_electronico }}</td>
                            <td>{{ $cliente->telefono }}</td>
                                            
                            <td>
                                                <!-- Botón de Administrar -->
                                <a href="{{ route('cliente.edit', $cliente->id_cliente) }}" class="btn btn-info btn-icon-split" style="width: 150px; display: inline-block;">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    <span class="text">Administrar</span>
                                </a>
                                                <!-- Modal para Contratos -->
                                               
                                <p></p>

                                <form id="deleteForm-{{ $cliente->id_cliente }}" action="{{ route('cliente.destroy', $cliente->id_cliente) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="button" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteModal-{{ $cliente->id_cliente }}">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Eliminar</span>
                                    </button>
                                </form>

                                <div class="modal fade" id="deleteModal-{{ $cliente->id_cliente }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-{{ $cliente->id_cliente }}" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel-{{ $cliente->id_cliente }}">Confirmar Eliminación</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                ¿Estás seguro de que deseas eliminar el cliente <strong>{{ $cliente->nombre_completo }}</strong>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                <button type="button" class="btn btn-danger" onclick="document.getElementById('deleteForm-{{ $cliente->id_cliente }}').submit();">Eliminar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No hay clientes registrados.</td>
                    </tr>
                    @endforelse
                </tbody>

            </table>            
        </div>    
    </div>
@endsection
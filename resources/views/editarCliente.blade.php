
@extends('plantilla')

@section('content')
<section class="direcciones">
                <h3>Direcciones Asociadas</h3>
                @if ($cliente->direcciones->isEmpty())
                    <p>No hay direcciones registradas para este cliente.</p>
                @else
                <div class="div-new">
                    <p>Registrar nueva direccion </p>

                    <!-- Botón para agregar dirección -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNuevaDireccion">
                        Agregar Nueva Dirección
                    </button>
                </div>
                <br><br>
                    <ul class="list-group">
                        @foreach ($cliente->direcciones as $direccion)
                            <li class="list-group-item">
                                <strong>Calle:</strong> {{ $direccion->calle }}<br>
                                <strong>Colonia:</strong> {{ $direccion->colonia }}<br>
                                <strong>Localidad:</strong> {{ $direccion->localidad }}<br>
                                <strong>Estado:</strong> {{ $direccion->entidad_federativa }}<br>
                                <strong>Código Postal:</strong> {{ $direccion->codigo_postal }}<br>
                                <strong>Referencias:</strong> {{ $direccion->referencia_domicilio }}
                                <br><br>
           
                                   <!-- Botón Editar -->
                                   <button 
                                        class="btn btn-primary btn-editar" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#modalEditarDireccion"
                                        data-id="{{ $direccion->id_direccion }}"
                                        data-calle="{{ $direccion->calle }}"
                                        data-colonia="{{ $direccion->colonia }}"
                                        data-localidad="{{ $direccion->localidad }}"
                                        data-entidad="{{ $direccion->entidad_federativa }}"
                                        data-cp="{{ $direccion->codigo_postal }}"
                                        data-referencia="{{ $direccion->referencia_domicilio }}">
                                        Editar
                                    </button>
                                
                                    <!-- Botón para abrir el modal -->
                                    @if (is_null($direccion->precontrato))
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmarPrecontratoModal" 
                                                data-id-direccion="{{ $direccion->id_direccion }}" 
                                                data-id-cliente="{{ $cliente->id_cliente }}" 
                                                >
                                            Registrar Precontrato
                                        </button>
                                    @else
                                        <span>Precontrato registrado</span>
                                    @endif
                            </li>
                        @endforeach
                    </ul>
                @endif

                
            </section>

            <!-- Modal de Confirmación del precontrato -->
            
            <div class="modal fade" id="confirmarPrecontratoModal" tabindex="-1" role="dialog" aria-labelledby="confirmarPrecontratoModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        <form id="formRegistrarPrecontrato" method="POST" action="{{ route('precontratos.registrar') }}">
                            @csrf
                           
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmarPrecontratoModalLabel">Confirmar Registro</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Selecciona un paquete para continuar:</p>
                                <div class="row">
                                    @foreach ($paquetes as $paquete)
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $paquete->nombre_paquete }}</h5>
                                                <p class="card-text">Precio: ${{ $paquete->precio }}</p>
                                                <input type="radio" name="fk_paquete" value="{{ $paquete->id_nombre_paquete }}" 
                                                onclick="setPaqueteId({{ $paquete->id_nombre_paquete }})" required>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <hr>
                                <p>¿Estás seguro de que deseas registrar este precontrato?</p>
                                <!-- Campos ocultos para enviar los datos -->
                                <input type="hidden" name="fk_cliente" id="modalFkCliente">
                                <input type="hidden" name="fk_direccion" id="modalFkDireccion">
                                <input type="hidden" name="fk_paquete" id="modalFkPaquete">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Confirmar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Modal para registrar nueva dirección -->
          
            <div class="modal fade" id="modalNuevaDireccion" tabindex="-1" aria-labelledby="modalNuevaDireccionLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalNuevaDireccionLabel">Registrar Nueva Dirección</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Contenido del modal -->
                            <form id="formNuevaDireccion" method="POST" action="{{ route('direcciones.add') }}">
                                @csrf
                                <input type="hidden" name="fk_cliente" value="{{ $cliente->id_cliente }}">
                                <div class="mb-3">
                                    <label for="calle" class="form-label">Calle</label>
                                    <input type="text" class="form-control" id="calle" name="calle" required>
                                </div>
                                <div class="mb-3">
                                    <label for="colonia" class="form-label">Colonia</label>
                                    <input type="text" class="form-control" id="colonia" name="colonia" required>
                                </div>
                                <div class="mb-3">
                                    <label for="localidad" class="form-label">Localidad</label>
                                    <input type="text" class="form-control" id="localidad" name="localidad" required>
                                </div>
                                <div class="mb-3">
                                    <label for="entidad_federativa" class="form-label">Estado</label>
                                    <input type="text" class="form-control" id="entidad_federativa" name="entidad_federativa" required>
                                </div>
                                <div class="mb-3">
                                    <label for="codigo_postal" class="form-label">Código Postal</label>
                                    <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" required>
                                </div>
                                <div class="mb-3">
                                    <label for="referencia_domicilio" class="form-label">Referencias</label>
                                    <textarea class="form-control" id="referencia_domicilio" name="referencia_domicilio" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar Dirección</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal para editar dirección existente -->
            <div class="modal fade" id="modalEditarDireccion" tabindex="-1" aria-labelledby="modalEditarDireccionLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditarDireccionLabel">Editar Dirección</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Formulario del modal -->
                            <form method="POST" id="formEditarDireccion">
                                @csrf
                                @method('PUT')
                                
                                <!-- Campo oculto para el ID de la dirección -->
                                <input type="hidden" id="id_direccion" name="id_direccion">
                                
                                <div class="mb-3">
                                    <label for="edit_calle" class="form-label">Calle</label>
                                    <input type="text" class="form-control" id="edit_calle" name="calle" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="edit_colonia" class="form-label">Colonia</label>
                                    <input type="text" class="form-control" id="edit_colonia" name="colonia" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="edit_localidad" class="form-label">Localidad</label>
                                    <input type="text" class="form-control" id="edit_localidad" name="localidad" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="edit_entidad_federativa" class="form-label">Estado</label>
                                    <input type="text" class="form-control" id="edit_entidad_federativa" name="entidad_federativa" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="edit_codigo_postal" class="form-label">Código Postal</label>
                                    <input type="text" class="form-control" id="edit_codigo_postal" name="codigo_postal" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="edit_referencia_domicilio" class="form-label">Referencias</label>
                                    <textarea class="form-control" id="edit_referencia_domicilio" name="referencia_domicilio" rows="3"></textarea>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Actualizar Dirección</button>
                            </form>
                        </div>
                    </div>
                
                </div>
            </div>
@endsection
          
    


    @section('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const botonesEditar = document.querySelectorAll('.btn-editar');

        botonesEditar.forEach(boton => {
            boton.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const calle = this.getAttribute('data-calle');
                const colonia = this.getAttribute('data-colonia');
                const localidad = this.getAttribute('data-localidad');
                const entidad = this.getAttribute('data-entidad');
                const cp = this.getAttribute('data-cp');
                const referencia = this.getAttribute('data-referencia');

                // Llenar el formulario del modal con los datos
                const formEditar = document.getElementById('formEditarDireccion');
                formEditar.action = `/direccion/update/${id}`;
                document.getElementById('id_direccion').value = id;
                document.getElementById('edit_calle').value = calle;
                document.getElementById('edit_colonia').value = colonia;
                document.getElementById('edit_localidad').value = localidad;
                document.getElementById('edit_entidad_federativa').value = entidad;
                document.getElementById('edit_codigo_postal').value = cp;
                document.getElementById('edit_referencia_domicilio').value = referencia;
            });
        });
    });
    </script>

    <script>
        // Función para asignar el ID del paquete al campo oculto
        function setPaqueteId(paqueteId) {
            const inputFkPaquete = document.getElementById('modalFkPaquete');
            if (inputFkPaquete) {
                inputFkPaquete.value = paqueteId; // Asignar el ID del paquete seleccionado
                console.log(`Paquete seleccionado: ${paqueteId}`); // Verificar que se asigna correctamente
            } else {
                console.error('Campo oculto modalFkPaquete no encontrado.');
            }
        }


        document.addEventListener('DOMContentLoaded', function () {
            const confirmarPrecontratoModal = document.getElementById('confirmarPrecontratoModal');

            confirmarPrecontratoModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;

                // Obtener los valores de los atributos data del botón
                const idDireccion = button.getAttribute('data-id-direccion');
                const idCliente = button.getAttribute('data-id-cliente');

                // Rellenar los campos ocultos del formulario
                document.getElementById('modalFkCliente').value = idCliente;
                document.getElementById('modalFkDireccion').value = idDireccion;

                // Limpiar selección previa de paquetes
                document.querySelectorAll('input[name="fk_paquete"]').forEach((radio) => {
                    radio.checked = false;
                });
            });
        });



    </script>
    @endsection
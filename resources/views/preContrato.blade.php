@extends('plantilla')

@section('content')
<div class="card shadow mb-4">
   <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Precontratos Existentes</h6>
   </div>
   <!-- Apartado que se necesita hacerse responsivo -->
   <div class="card-body">
      <div class="table-responsive">
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
            <tbody> @forelse($precontratos as $precontrato) <tr>
                  <td>{{ $precontrato->id_precontrato }}</td>
                  <td>{{ $precontrato->cliente->nombre_completo ?? 'Sin Cliente' }}</td>
                  <td>{{ $precontrato->direccion->calle ?? 'Sin Dirección' }}</td>
                  <td>{{ $precontrato->paquete->nombre_paquete ?? 'Sin Paquete' }}</td>
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
                              <form action="{{ route('precontrato.cambiarPaquete', $precontrato->id_precontrato) }}" method="POST"> @csrf @method('PUT') <div class="modal-header">
                                    <h5 class="modal-title" id="cambiarPaqueteLabel-{{ $precontrato->id_precontrato }}">Cambiar Paquete</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">×</span>
                                    </button>
                                 </div>
                                 <div class="modal-body">
                                    <div class="mb-3">
                                       <label for="fk_paquete-{{ $precontrato->id_precontrato }}" class="form-label">Seleccionar Paquete</label>
                                       <select class="form-control" id="fk_paquete-{{ $precontrato->id_precontrato }}" name="fk_paquete" required> @foreach ($paquetes as $paquete) <option value="{{ $paquete->id_nombre_paquete }}" {{ $precontrato->paquete->id_nombre_paquete == $paquete->id_nombre_paquete ? 'selected' : '' }}>
                                             {{ $paquete->id_nombre_paquete }} - {{ $paquete->nombre_paquete }}
                                          </option> @endforeach </select>
                                    </div>
                                    <!-- Selección de Estado de Cliente en caso de usar eliminar no afecta funcionamiento 
                                                                        <div class="mb-3"><label for="es_cliente-{{ $precontrato->id_precontrato }}" class="form-label">¿Es Cliente?</label><select class="form-control" id="es_cliente-{{ $precontrato->id_precontrato }}" name="es_cliente" required><option value="1" {{ $precontrato->cliente->es_cliente == 1 ? 'selected' : '' }}>Sí</option><option value="0" {{ $precontrato->cliente->es_cliente == 0 ? 'selected' : '' }}>No</option></select></div>-->
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
               <div class="modal-body"> Este cliente ya tiene un contrato </div>
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
                  </div> ¿Está seguro de que desea crear un contrato para este cliente?
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-primary" id="confirmarContratoBtn">Crear Contrato</button>
               </div>
            </div>
         </div>
      </div>
      </td>
      </tr> @empty <tr>
         <td colspan="10" class="text-center">No hay precontratos.</td>
      </tr> @endforelse </tbody>
      </table>
   </div>
</div>
</div>
@endsection
                 
                
            


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


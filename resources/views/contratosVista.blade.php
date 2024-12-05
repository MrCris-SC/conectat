
@extends('plantilla')

@section('content')
<div class="card shadow mb-4">
<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-primary">Contratos</h6>
</div>
<!-- Apartado que se necesita hacerse responsivo -->
<div class="card-body">
  <div class="table-responsive" style="overflow-x: auto; max-width: 100%;">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <!-- <th>ID</th> -->
          <th>Folio</th>
          <th>Inicio</th>
          <th>Final</th>
          <th>Estado</th>
          <th>Monto</th>
          <th>Paquete</th>
          <th>Cliente</th>
          <th>Aciones</th>
        </tr>
      </thead>
      <tbody> @if($contratos->isEmpty()) <tr>
          <td colspan="8" class="text-center">No hay clientes registrados.</td>
        </tr> @else @foreach($contratos as $contrato) <tr>
          <td>{{ $contrato->id_contrato }}</td>
          <td>{{ $contrato->fecha_inicio_contrato ?? 'Sin asignar' }}</td>
          <td>{{ $contrato->fecha_fin_contrato ?? 'Sin asignar' }}</td>
          <td>{{ ucfirst($contrato->estado) }}</td>
          <td>{{ $contrato->monto_total_contrato }}</td>
          <td>{{ $contrato->precontrato->paquete->nombre_paquete }}</td>
          <td>{{ $contrato->precontrato->cliente->id_cliente }}-{{ $contrato->precontrato->cliente->nombre_completo }}</td>
          <td>
            <a href="{{ route('gestionContrato.show', $contrato->id_contrato) }}" class="btn btn-info btn-icon-split" style="width: 150px; display: inline-block;">
              <span class="icon text-white-50">
                <i class="fas fa-edit"></i>
              </span>
              <span class="text">Administrar</span>
            </a>
          </td>
        </tr> @endforeach @endif </tbody>
    </table>
  </div>
</div>
@endsection


                

@section('scripts')
<script>
        function crearContratoYDescargarPDF(clienteId) {
            // Enviar la solicitud para insertar el contrato en la base de datos
            fetch(`/cliente/${clienteId}/contrato`, {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ /* cualquier otro dato adicional si es necesario */ })
            })
            .then(response => {
                if (response.ok) {
                    // Redirigir a la URL de descarga del PDF después de la inserción
                    window.location.href = `/cliente/${clienteId}/contrato`;
                } else {
                    console.error("Error al insertar el contrato:", response);
                }
            })
            .catch(error => console.error("Error en la solicitud:", error));
        }
    </script>

@endsection

        

    
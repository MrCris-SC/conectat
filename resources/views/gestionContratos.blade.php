<!-- resources/views/welcome.blade.php -->
@extends('plantilla') <!-- Indicas que esta vista extiende de la plantilla 'app' -->

@section('content')
    <!-- Mostrar detalles del contrato -->
    <div>
        <h4>Contrato de: {{ $contrato->precontrato->cliente->nombre_completo }}</h4>
        <p>Fecha de inicio: {{ $contrato->fecha_inicio_contrato ?? 'Sin asignar' }}</p>
        <p>Fecha de fin: {{ $contrato->fecha_fin_contrato ?? 'Sin asignar' }}</p>
        <p>Monto total: {{ $contrato->monto_total_contrato }}</p>
        <p>Paquete: {{ $contrato->precontrato->paquete->nombre_paquete }}</p>
        <p>Estado: {{ ucfirst($contrato->estado) }}</p>
    </div>

    <!-- Sección para cambiar el estado del contrato -->
    <div class="card mt-4">
        <div class="card-header">
            <h5>Cambiar Estado del Contrato</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('contratos.updateEstado', $contrato->id_contrato) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="estado">Estado del Contrato</label>
                    <select class="form-control" id="estado" name="estado" required>
                        <option value="pendiente" {{ $contrato->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="activo" {{ $contrato->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                        <option value="inactivo" {{ $contrato->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Actualizar Estado</button>
            </form>
        </div>
    </div>

@endsection

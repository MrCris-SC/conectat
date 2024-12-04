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

            <!-- Selección de estado del contrato -->
            <div class="form-group">
                <label for="estado">Estado del Contrato</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="pendiente" {{ $contrato->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="activo" {{ $contrato->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ $contrato->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <!-- Botones para actualizar estado y ver pagos -->
            <button type="submit" class="btn btn-success">Actualizar Estado</button>
            <a href="{{ route('contrato.pagos', $contrato->id_contrato) }}" class="btn btn-primary">Ver Pagos</a>
        </form>

        <!-- Calendario de Pagos -->
        <div class="mt-4">
            <h5>Calendario de Pagos</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>Fecha de Pago</th>
                        <th>Monto</th>
                        <th>Estado</th>
                        <th>Ticket</th>
                    </tr>
                </thead>
                
                <tbody>
                    @forelse ($pagos as $pago)
                    <tr data-estado="{{ $pago->estado_pago }}">
                        <td>{{ $pago->fecha_pago }}</td>
                        <td>{{ $pago->monto_acumulado_pagos }}</td>
                        <td>{{ ucfirst($pago->estado_pago) }}</td>
                        <td>
                            @if ($pago->estado_pago === 'pagado')
                                <a class="btn btn-info btn-icon-split" style="width: 175px; display: none;" disabled>
                                    <span class="icon text-white-50">
                                        <i class="fas fa-file-contract"></i>
                                    </span>
                                    <span class="text">Generar Ticket</span>
                                </a>
                            @elseif ($pago->estado_pago === 'pendiente' || $pago->estado_pago === 'atrasado')
                                <a href="{{ route('pagos.ticket', $pago->id_pago) }}" class="btn btn-info btn-icon-split" 
                                target="_blank" onclick="setTimeout(() => { location.reload(); }, 1000);" 
                                style="width: 175px; display: inline-block;">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-file-contract"></i>
                                    </span>
                                    <span class="text">Generar Ticket</span>
                                    </a>
                            @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">No hay pagos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection

@extends('plantilla') 
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="text-center my-4">Agregar Paquete de Internet</h1>
  <div class="container" style="max-width: 60rem;">
    <div class="row" style="align-items: center; display: flex;
                            justify-content: center; margin: 0 auto;">
      <!-- Columna del formulario -->
      <div class="col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <form method="POST" action="/agregar-paquete"> @csrf <div class="form-group">
                <label for="nombre_paquete">Nombre del Paquete</label>
                <input type="text" name="nombre_paquete" class="form-control form-control-sm" required>
              </div>
              <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" name="precio" class="form-control form-control-sm" required>
              </div>
              <div class="form-group">
                <label for="caracteristicas_paquete">Características</label>
                <input type="text" name="caracteristicas_paquete" class="form-control form-control-sm" required>
              </div>
              <div class="form-group">
                <label for="velocidad_paquete">Velocidad</label>
                <input type="text" name="velocidad_paquete" class="form-control form-control-sm" required>
              </div>
              <div class="form-group">
                <label for="fk_promocion">Promoción</label>
                <select name="fk_promocion" class="form-control"> @if (isset($promociones) && $promociones->count() > 0) @foreach($promociones as $promocion) <option value="{{ $promocion->id_promocion }}">{{ $promocion->promocion }}</option> @endforeach @else <option value="">No hay promociones disponibles</option> @endif </select>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Agregar Paquete</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- /.container-fluid -->
@endsection
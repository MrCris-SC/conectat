@extends('plantilla') 
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
<div class="container">
  <h1 class="text-center my-4">Agregar Paquete de Internet</h1>
  <div class="row" style="align-items: center; display: flex;
                            justify-content: center; margin: 0 auto;">
    <!-- Columna del formulario -->
    <div class="col-md-6 mb-4">
      <div class="card">
        <div class="card-body">
          <form method="POST" action="{{ route('paquete.update', $paquete->id_nombre_paquete) }}"> @csrf @method('PUT') <div class="form-group">
              <label for="nombre_paquete">Nombre del Paquete</label>
              <input type="text" name="nombre_paquete" class="form-control" value="{{ $paquete->nombre_paquete }}" required>
            </div>
            <div class="form-group">
              <label for="precio">Precio</label>
              <input type="number" name="precio" class="form-control" value="{{ $paquete->precio }}" required>
            </div>
            <div class="form-group">
              <label for="caracteristicas_paquete">Características</label>
              <input type="text" name="caracteristicas_paquete" class="form-control" value="{{ $paquete->caracteristicas_paquete }}" required>
            </div>
            <div class="form-group">
              <label for="velocidad_paquete">Velocidad</label>
              <input type="text" name="velocidad_paquete" class="form-control" value="{{ $paquete->velocidad_paquete }}" required>
            </div>
            <div class="form-group">
              <label for="fk_promocion">Promoción</label>
              <select name="fk_promocion" class="form-control"> @foreach($promociones as $promocion) <option value="{{ $promocion->id_promocion }}" {{ $paquete->fk_promocion == $promocion->id_promocion ? 'selected' : '' }}>
                  {{ $promocion->promocion }}
                </option> @endforeach </select>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Actualizar Paquete</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- /.container-fluid -->
@endsection
                

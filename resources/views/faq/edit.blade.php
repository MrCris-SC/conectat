@extends('plantilla')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Editar Pregunta</h1>

        <form action="{{ route('faq.update', $pregunta->id_pregunta) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="pregunta" class="form-label">Pregunta</label>
            <input type="text" class="form-control" id="pregunta" name="pregunta" value="{{ $pregunta->pregunta }}" required>
        </div>

        <div class="mb-3">
            <label for="respuesta_pregunta" class="form-label">Respuesta</label>
            <textarea class="form-control" id="respuesta_pregunta" name="respuesta_pregunta" rows="5" required>{{ $pregunta->respuesta_pregunta }}</textarea>
        </div>

        <div class="mb-3">
            <label for="fk_categoria" class="form-label">Categoría</label>
            <input type="number" class="form-control" id="fk_categoria" name="fk_categoria" value="{{ $pregunta->fk_categoria }}" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar Cambios</button>
        <a href="{{ route('faq.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

</div>
@endsection

@extends('plantilla')

@section('content')
<div class="container mt-5">
    <h1>Preguntas Frecuentes</h1>
    <div class="row">
        @forelse ($preguntas as $pregunta)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5>{{ $pregunta->pregunta }}</h5>
                    </div>
                    <div class="card-body">
                        <p>{{ $pregunta->respuesta_pregunta }}</p>
                        <p><strong>Categoría:</strong> {{ $pregunta->fk_categoria }}</p>
                        <a href="{{ route('faq.edit', $pregunta->id_pregunta) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('faq.destroy', $pregunta->id_pregunta) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p>No hay preguntas registradas.</p>
        @endforelse
    </div>
</div>
@endsection

@extends('plantilla')

@section('content')
    <section>
        <div class="container mt-5">
            <h1>Reportes</h1>
            <div class="row">
                @forelse ($tickets as $ticket)
                    <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5>{{ $ticket->fecha_reporte }}</h5>
                        </div>
                        <div class="card-body">
                            <p>{{ $ticket->problema }}</p>
                            
                          
                        </div>
                    </div>
                </div>
            @empty
                <p>No hay preguntas registradas.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
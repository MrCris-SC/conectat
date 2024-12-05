@extends('plantilla')

@section('content')
    
<div class="container">
        <h2>Registrar Nuevo Administrador</h2>
        
        <!-- Muestra los errores de validación -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="Nombre">Nombre</label>
                <input type="text" name="Nombre" class="form-control" value="{{ old('Nombre') }}" required>
            </div>
            <div class="form-group">
                <label for="Correo_electronico">Correo Electrónico</label>
                <input type="email" name="Correo_electronico" class="form-control" value="{{ old('Correo_electronico') }}" required>
            </div>
            <div class="form-group">
                <label for="Contraseña">Contraseña</label>
                <input type="password" name="Contraseña" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="permisos">Permisos</label>
                <select name="permisos" class="form-control">
                    <option value="admin">Administrador</option>
                    <option value="superadmin">Super Administrador</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
            
            
@endsection

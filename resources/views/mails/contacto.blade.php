<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Mensaje de Contacto</title>
</head>
<body>
    <h1>Nuevo Mensaje de Contacto</h1>
    <p><strong>Nombre:</strong> {{ $data['nombre'] }}</p>
    <p><strong>Correo Electrónico:</strong> {{ $data['correo'] }}</p>
    <p><strong>Mensaje:</strong></p>
    <p>{{ $data['mensaje'] }}</p>
</body>
</html>

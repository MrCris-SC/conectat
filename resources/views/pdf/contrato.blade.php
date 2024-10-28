<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrato de Servicio</title>
</head>
<body>
    <h1>Contrato de Servicio</h1>

    <p><strong>Nombre Completo:</strong> {{ $cliente->nombre_completo }}</p>
    <p><strong>Correo Electrónico:</strong> {{ $cliente->correo_electronico }}</p>
    <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
    <p><strong>Dirección:</strong> {{ $cliente->direccion }}</p>
    <p><strong>Código Postal:</strong> {{ $cliente->cp }}</p>
    <p><strong>Municipio:</strong> {{ $cliente->municipio }}</p>
    <p><strong>Paquete Elegido:</strong> {{ $cliente->nombre_paquete->nombre_paquete }} ({{ $cliente->nombre_paquete->caracteristicas_paquete }})</p>
    <p><strong>Precio:</strong> ${{ $cliente->nombre_paquete->precio }}</p>
    <p><strong>Velocidad:</strong> {{ $cliente->nombre_paquete->velocidad_paquete }} Mbps</p>

    <p>Este contrato tiene una duración mínima de 6 meses.</p>

    <p>Firma del Cliente: ________________________________</p>
    <p>Fecha: ________________________________</p>
</body>
</html>

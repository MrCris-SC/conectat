<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Contrato</title>
</head>
<body>
    <h1>Datos recibidos para el precontrato</h1>
    <p>Hola {{ $nombre_usuario }}:</p>
    <p>Confirmamos que hemos recibido tu precontrato con éxito.</p>
    <p>Con la siguiente información:</p>
    <p>Paquete seleccionado: {{ $nombre_paquete }}</p>
    <p>Te esperamos en el siguiente local: {{ $direccion_itssy }}</p>
    <p>Saludos,<br>Equipo de ITSSY</p>
    <p>Gracias por su preferencia</p>
    <p>Este es un mensaje automático, por favor no responder a este email.</p>
</body>
</html>
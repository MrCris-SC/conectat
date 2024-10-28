<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página fuera de servicio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
            padding: 50px;
        }
        h1 {
            color: #333;
        }
        p {
            color: #777;
        }
    </style>
</head>
<body>
    <h1>Página fuera de servicio</h1>
    <p>Lo sentimos, estamos experimentando problemas técnicos. Por favor, inténtalo de nuevo más tarde.</p>
    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif
</body>
</html>

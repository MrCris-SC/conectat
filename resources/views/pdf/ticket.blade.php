<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket de Pago</title>
    <style>
        /* Estilo general del cuerpo */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        /* Estilo del contenedor principal del ticket */
        .ticket {
            width: 300px; /* Tamaño del ticket */
            padding: 20px;
            margin: 50px auto;
            background-color: #fff;
            border: 2px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-size: 14px;
        }

        /* Estilo para el encabezado */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .header p {
            font-size: 12px;
            color: #666;
        }

        /* Estilo de los datos */
        .data p {
            margin: 5px 0;
        }

        .data strong {
            font-weight: bold;
        }

        /* Estilo del pie de página */
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }

        /* Agregar el borde superior al ticket */
        .ticket::before {
            content: '';
            display: block;
            height: 4px;
            background-color: #007BFF;
            margin-bottom: 15px;
        }

        /* Estilo para la imagen */
        .header img {
            max-width: 100px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <div class="ticket">
        <div class="header">
            <img src="asset{{images/logo1.png }}" alt="">
            <h2>Ticket de Pago</h2>
            <!--<p><strong>Número de Pago:</strong> {{ $pago->id_pago }}</p>
            <p><strong>Fecha y Hora de Pago:</strong> {{ now()->format('d/m/Y H:i:s') }}</p>-->
        </div>

        <div class="data">
            <p><strong>Cliente:</strong> {{ $cliente->nombre_completo }}</p>
            <p><strong>Contrato:</strong> {{ $pago->contrato->id_contrato }}</p>
            <p><strong>Paquete:</strong> {{ $paquete->nombre_paquete }}</p>
            <p><strong>Fecha de Pago:</strong> {{ $pago->fecha_pago }}</p>
            <p><strong>Monto Pagado:</strong> ${{ number_format($pago->monto_acumulado_pagos, 2) }}</p>
            <br>
            <p><strong>Fecha de Próximo Pago:</strong> 
                {{ $proximoPago ? $proximoPago->fecha_pago : 'No hay pagos' }}
            </p>
        </div>

        <div class="footer">
            <p>Gracias por su pago.</p>
        </div>
    </div>

</body>
</html>

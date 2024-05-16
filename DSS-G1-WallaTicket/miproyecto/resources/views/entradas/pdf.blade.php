<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos CSS adicionales para el PDF */
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        h1 {
            margin-bottom: 20px;
            text-align: center;
            font-size: 24px;
            color: #333;
            text-transform: uppercase;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .event-details {
            margin-bottom: 20px;
        }
        .event-details img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
        .cache-info {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: 50px;
        }
        @media print {
            body {
                padding: 0;
                margin: 0;
                font-size: 10pt;
            }
            .container {
                width: 100%;
                padding: 10px;
                margin: 0;
                box-sizing: border-box;
            }
            .cache-info {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Entrada</h1>
        <div class="event-details">
            <img src="{{ public_path($entrada->evento->foto) }}" alt="Foto del evento" class="img-fluid">
            <p><strong>Nombre del evento:</strong> {{ $entrada->evento->nombre_evento }}</p>
            <p><strong>Descripción:</strong> {{ $entrada->evento->descripcion }}</p>
            <p><strong>Fecha:</strong> {{ $entrada->evento->fecha }}</p>
            <p><strong>Local:</strong> {{ $entrada->evento->local->empresa }}</p>
            <p><strong>Lugar:</strong> {{ $entrada->evento->local->direccion }}</p>
        </div>
        <div class="cache-info">
            Esta entrada ha sido generada el {{ now()->format('d/m/Y') }} a las {{ now()->format('H:i:s') }}. <br>
            La información puede estar sujeta a cambios.
        </div>
    </div>
</body>
</html>






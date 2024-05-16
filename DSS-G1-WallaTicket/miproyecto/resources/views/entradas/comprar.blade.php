@extends('layouts.master')

@section('content')

@php
    $nombre = $evento->nombre_evento;
@endphp

    @foreach($entradas as $entrada)
        @if($entrada->evento_id == $evento->id)
            @php
                $precio = $entrada->precio;
                break;
            @endphp
        @endif
    @endforeach

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #45a049;
        }

        .form-group input[readonly] {
            background-color: #f5f5f5;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="/images/paypal.png" height="100px" style="margin-bottom: 40px;">
        <div class="form-group">
            <label for="amount">Cantidad:</label>
            <input type="text" id="amount" name="amount" value="{{ $precio }}" readonly>
        </div>
        <div class="form-group">
            <label for="currency">Moneda:</label>
            <input type="text" id="currency" name="currency_code" value="Euros (€)" readonly>
        </div>
        <div class="form-group">
            <label for="description">Descripción:</label>
            <input type="text" id="description" name="item_name" value= "{{ $nombre }}" readonly>
        </div>
        <script>
            function mostrarMensaje() {
                alert("¡Enhorabuena! Ya tienes tu entrada.");
                window.location.href = "/";
            }
        </script>
        <div class="form-group">
            <button type="submit" onclick="mostrarMensaje()">Pagar con PayPal</button>
        </div>
    </div>
</body>
</html>


@foreach($entradas as $entrada)
    @if($entrada->vendida == 0 && $entrada->evento_id == $evento->id)
        @php
            $entrada->vendida = 1;
            $entrada->user_id = $user->id;
            $entrada->save();
            break;
        @endphp
    @endif
@endforeach


@endsection

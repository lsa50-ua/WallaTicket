@extends('layouts.master')

@section('filter')

<form method="GET" action="{{ route('entradas.index') }}">
    @csrf
    <label for="ordenar" style="color: white;">Ordenar por:</label>
    <select id="ordenar" name="ordenar">
        <option value="en_stock">En stock</option>
    </select>
    <button type="submit">Ordenar</button>
</form>

<form method="GET" action="{{ route('entradas.index') }}" class="form-inline my-2 my-lg-0 ml-auto">
    <input class="form-control mr-sm-2" type="text" placeholder="Buscar entrada" aria-label="Buscar" name="buscar">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
</form>

@endsection

@section('content')
<h1> Venta de Entradas </h1>
@if (auth()->check() && Auth::user()->rol == 'admin')
<a href="{{ route('entradas.create') }}" class="btn btn-primary">Crear nueva entrada</a>
@endif

<div class="row">
    @foreach($eventos as $e)
    <div class="col-md-6">
        <div class="d-flex align-items-center">
            <div>

                @php
                    $contador = 0;
                @endphp

                @foreach($entradas as $entrada)
                    @if($entrada->vendida == 0 && $entrada->evento_id == $e->id)
                        @php
                            $contador++;
                        @endphp
                    @endif
                @endforeach

                <h3>{{ $e->nombre_evento }}</h3>
                <img src="{{ asset($e->local->foto) }}" style="width: 200px; height: 150px; margin-bottom: 5px;">
                @if($contador == 0)
                    <a class="btn btn-danger" style="margin-left: 50px;">Agotadas</a>
                @else
                    <a href="{{ route('entradas.comprar', ['id' => $e->id]) }}" class="btn btn-primary" style="margin-left: 50px;">Comprar</a>
                    <p style="margin-left: 255px; margin-bottom: 0px;">Disponibles: {{ $contador }}</p>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection

@extends('layouts.master')

@section('filter')

<form method="GET" action="{{ route('eventos.index') }}">
    @csrf
    <label for="ordenar" style="color: white;">Ordenar por:</label>
    <select id="ordenar" name="ordenar">
        <option value="aforo">Aforo</option>
        <option value="fecha">Fecha</option>
    </select>
    <button type="submit">Ordenar</button>
</form>

<form method="GET" action="{{ route('eventos.index') }}" class="form-inline my-2 my-lg-0 ml-auto">
    <input class="form-control mr-sm-2" type="text" placeholder="Buscar evento" aria-label="Buscar" name="buscar">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
</form>

@endsection

@section('content')

    <h1> Lista de Eventos </h1>
    @foreach($eventos as $e)
        <p>
            <a href="{{ route('eventos.show', ['id' => $e->id]) }}">
            {{$e-> nombre_evento}}
        </p>
    @endforeach
    
    {{ $eventos->links() }}

@endsection
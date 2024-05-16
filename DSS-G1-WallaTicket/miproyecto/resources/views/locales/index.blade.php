@extends('layouts.master')

@section('filter')

<form method="GET" action="{{ route('locales.index') }}">
    @csrf
    <label for="ordenar" style="color: white;">Ordenar por:</label>
    <select id="ordenar" name="ordenar">
        <option value="alfabéticamente">Alfabéticamente</option>
    </select>
    <button type="submit">Ordenar</button>
</form>

<form method="GET" action="{{ route('locales.index') }}" class="form-inline my-2 my-lg-0 ml-auto">
    <input class="form-control mr-sm-2" type="text" placeholder="Buscar local" aria-label="Buscar" name="buscar">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
</form>

@endsection

@section('content')
    @auth
        <h1> Lista de Locales </h1>
        <br>
        @if(Auth::user()->esAdmin())
            <a href="{{ route('locales.create') }}" class="btn btn-primary">Crear Local</a>
            <br>
            <br>
        @endif
        @foreach($locales as $l)
            <p>
                <a href="{{ route('locales.show', ['id' => $l->id]) }}">
                {{$l->empresa}}
            </p>
        @endforeach

        {{ $locales->links() }}
    @endauth
@endsection









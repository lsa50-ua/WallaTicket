@extends('layouts.master')

@section('filter')

<form method="GET" action="{{ route('usuarios.index') }}">
    @csrf
    <label for="ordenar" style="color: white;">Ordenar por:</label>
    <select id="ordenar" name="ordenar">
        <option value="alfabéticamente">Alfabéticamente</option>
    </select>
    <button type="submit">Ordenar</button>
</form>

<form method="GET" action="{{ route('usuarios.index') }}" class="form-inline my-2 my-lg-0 ml-auto">
    <input class="form-control mr-sm-2" type="text" placeholder="Buscar usuario" aria-label="Buscar" name="buscar">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
</form>

@endsection

@section('content')

    <h1> Lista de Usuarios </h1>

        @foreach($usuarios as $u)
            <div class="col-md-4">
                <a href="{{ route('usuarios.show', ['id' => $u->id]) }}">
                    {{$u-> email}}
                </a>
            </div>
        @endforeach

    {{ $usuarios->appends(['ordenar_por' => request('ordenar_por')])->links() }}

@endsection

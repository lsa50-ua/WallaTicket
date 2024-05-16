@extends('layouts.master')

@section('filter')

<form method="GET" action="{{ route('reseñas.index') }}">
    @csrf
    <label for="ordenar" style="color: white;">Ordenar por:</label>
    <select id="ordenar" name="ordenar">
        <option value="mejor_valoradas_y_mas_recientes">Mejor valoradas y más recientes</option>
    </select>
    <button type="submit">Ordenar</button>
</form>

<form method="GET" action="{{ route('reseñas.index') }}" class="form-inline my-2 my-lg-0 ml-auto">
    <input class="form-control mr-sm-2" type="text" placeholder="Buscar reseñas@extends('layouts.master')

@section('filter')

<form method="GET" action="{{ route('reseñas.index') }}">
    @csrf
    <label for="ordenar" style="color: white;">Ordenar por:</label>
    <select id="ordenar" name="ordenar">
        <option value="mejor_valoradas_y_mas_recientes">Mejor valoradas y más recientes</option>
    </select>
    <button type="submit">Ordenar</button>
</form>

<form method="GET" action="{{ route('reseñas.index') }}" class="form-inline my-2 my-lg-0 ml-auto search-bar">
    <input class="form-control mr-sm-2" type="text" placeholder="Buscar reseña" aria-label="Buscar" name="buscar">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
</form>

@endsection

@section('content')

    <h1> Lista de reseñas </h1>
    @if (auth()->check() && Auth::user()->rol == 'admin')
    <a href="{{ route('reseñas.create') }}" class="btn btn-primary">Crear nueva reseña</a>
    @endif
    @foreach($reseñas->groupBy('evento.nombre_evento') as $nombre_evento => $reseñas_por_evento)
        <h2>Evento {{$nombre_evento}}</h2>
        <ul>
            @foreach($reseñas_por_evento as $reseña)
                <li>
                    <a href="{{ route('reseñas.show', ['id' => $reseña->id]) }}">
                        Reseña {{$reseña->id}}
                    </a>
                </li>
            @endforeach
        </ul>
    @endforeach

    {{ $reseñas->appends(['ordenar' => $ordenar])->appends(['buscar' => $buscar])->links() }}

@endsection
" aria-label="Buscar" name="buscar">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
</form>

@endsection

@section('content')

    <h1> Lista de reseñas </h1>

    <a href="{{ route('reseñas.create') }}" class="btn btn-primary">Crear nueva reseña</a>

    @foreach($reseñas->groupBy('evento.nombre_evento') as $nombre_evento => $reseñas_por_evento)
        <h2>Evento {{$nombre_evento}}</h2>
        <ul>
            @foreach($reseñas_por_evento as $reseña)
                <li>
                    <a href="{{ route('reseñas.show', ['id' => $reseña->id]) }}">
                        Reseña {{$reseña->id}}
                    </a>
                </li>
            @endforeach
        </ul>
    @endforeach

    {{ $reseñas->appends(['ordenar' => $ordenar])->appends(['buscar' => $buscar])->links() }}

@endsection

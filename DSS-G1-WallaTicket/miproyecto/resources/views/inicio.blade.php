@extends('layouts.master')

@section('title', 'Página de Inicio')

@section('content')
    <h1>Bienvenidos a WallaTicket</h1>

    <h2>Próximos Eventos</h2>
    <ul>
        @foreach ($eventos as $evento)
            <li>
                <h3>{{ $evento->nombre_evento }}</h3>
                <a href="{{ route('eventos.show', $evento->id) }}">
                    <img src="{{ asset ($evento->foto) }}" alt="Foto" style="width: 300px;">
                </a>
                <p>{{ $evento->descripcion }}</p>
                <a href="{{ route('eventos.show', $evento->id) }}" class="btn btn-primary">Ver más</a>
            </li>
        @endforeach
    </ul>

    <div class="d-flex justify-content-center">
        {{ $eventos->links() }}
    </div>
@endsection

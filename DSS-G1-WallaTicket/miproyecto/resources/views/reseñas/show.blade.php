@extends('layouts.master')

@section('content')

    <h1>{{ $reseña->id }}</h1>
    <p>Usuario: {{ $reseña->user->name }}</p>
    <p>Comentario: {{ $reseña->comentario }}</p>
    <p>Puntuación: {{ $reseña->puntuacion }}</p>
    @if (auth()->check() && Auth::user()->rol == 'admin')
    <form method="POST" action="{{ route('reseñas.destroy', $reseña->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Borrar reseña</button>
    </form>    
    <form method="GET" action="{{ route('reseñas.edit', $reseña->id) }}">
    <button type="submit" class="btn btn-primary" formaction="{{ route('reseñas.edit', ['id' => $reseña->id]) }}">Editar reseña</button>
    </form>
    @endif
@endsection

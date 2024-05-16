@extends('layouts.master')

@section('content')

    <h1>Modificar reseña</h1>

    <form method="POST" action="{{ route('reseñas.update', ['id' => $reseña->id]) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="user_id">Usuario</label>
            <select name="user_id" class="form-control" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }} (ID: {{ $usuario->id }})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="comentario">Comentario</label>
            <textarea name="comentario" class="form-control" required>{{ $reseña->comentario }}</textarea>
        </div>

        <div class="form-group">
            <label for="puntuacion">Puntuación</label>
            <input type="number" name="puntuacion" class="form-control" min="1" max="5" value="{{ $reseña->puntuacion }}" required>
        </div>

        <div class="form-group">
            <label for="evento_id">Evento</label>
            <select name="evento_id" class="form-control" required>
                @foreach($eventos as $evento)
                    <option value="{{ $evento->id }}" {{ $evento->id == $reseña->evento_id ? 'selected' : '' }}>{{ $evento->nombre_evento }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>

@endsection

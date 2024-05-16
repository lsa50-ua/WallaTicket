@extends('layouts.master')

@section('content')

    <h1>Modificar local</h1>

    <form method="POST" action="{{ route('locales.update', ['id' => $local->id]) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="empresa">Nombre Empresa</label>
            <textarea name="empresa" class="form-control" required>{{ $local->empresa }}</textarea>
        </div>

        <div class="form-group">
            <label for="direccion">Dirección</label>
            <textarea name="direccion" class="form-control" required>{{ $local->direccion }}</textarea>
        </div>

        <div class="form-group">
            <label for="urlImagen">Imagen Local</label>
            <textarea name="foto" class="form-control" required>{{ $local->foto }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>

@endsection
@extends('layouts.master')

@section('content')

    <h1>Crear nueva entrada</h1>

    <form method="POST" action="{{ route('entradas.store') }}">
        @csrf

        <div class="form-group">
            <label for="evento">Evento</label>
            <select name="evento_id" id="evento" class="form-control">
                @foreach($eventos as $evento)
                    <option value="{{ $evento->id }}">{{ $evento->nombre_evento }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" step="0.01" name="precio" id="precio" class="form-control">
        </div>

        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Crear entrada</button>
    </form>

@endsection

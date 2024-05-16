@extends('layouts.master')

@section('content')

    <h1>Editar entrada</h1>

    <form method="POST" action="{{ route('entradas.update', ['id' => $entrada->id]) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="evento">Evento</label>
            <select name="evento_id" id="evento" class="form-control">
                @foreach($eventos as $evento)
                    <option value="{{ $evento->id }}" {{ $evento->id == $entrada->evento_id ? 'selected' : '' }}>{{ $evento->nombre_evento }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" step="0.01" name="precio" id="precio" class="form-control" value="{{ $entrada->precio }}">
        </div>

        <div class="form-group">
            <label for="vendida">Vendida</label>
            <select name="vendida" id="vendida" class="form-control">
                <option value="0" {{ $entrada->vendida == 0 ? 'selected' : '' }}>NO</option>
                <option value="1" {{ $entrada->vendida == 1 ? 'selected' : '' }}>SI</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>

@endsection

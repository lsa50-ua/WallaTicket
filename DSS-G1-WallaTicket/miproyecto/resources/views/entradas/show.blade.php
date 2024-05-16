@extends('layouts.master')
@section('content')

<h1> {{$entrada->evento->nombre_evento}} </h1>

<img src="{{ asset ($entrada->evento->local->foto) }}" alt="Foto">
<br>
<br>
<div>
    <p> Precio: {{ $entrada->precio }} €</p>
    @if($entrada->vendida == 0)
        <p> Vendida: NO </p>
    @else
        <p> Vendida: SI </p>
    @endif
</div>
@if (auth()->check() && Auth::user()->rol == 'admin')
<form method="POST" action="{{ route('entradas.destroy', ['id' => $entrada->id]) }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Borrar entrada</button>
</form>

<form method="GET" action="{{ route('entradas.edit', ['id' => $entrada->id]) }}">
    <button type="submit" class="btn btn-primary" formaction="{{ route('entradas.edit', ['id' => $entrada->id]) }}">Editar entrada</button>
</form>
@endif
@endsection
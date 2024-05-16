@extends('layouts.master')
@section('content')


<h1> {{ $usuario-> email}} </h1>
<br>
@if (auth()->check() && Auth::user()->rol == 'admin')
<form method="POST" action="{{ route('usuarios.destroy', ['id' => $usuario->id]) }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Borrar Usuario</button>
</form>
@endif
    <br>
        <p> Nombre: {{$usuario->name}} </p>
        <p> Apellido: {{$usuario->apellido}} </p>
        <p> Teléfono: {{ $usuario-> telefono}} </p>
        <p> Dirección: {{ $usuario-> direccion}} </p>
        <p> Fecha Nacimiento: {{ $usuario-> fecha_nac}} </p>
        <p> DNI: {{ $usuario-> dni}} </p>
    </div>

@endsection
@extends('layouts.master')

@section('content')
<div class="container">
    <h1 class="mb-4">Mis Entradas</h1>
    
    @if ($entradas->count() > 0)
        <ul class="list-group">
            @foreach ($entradas as $entrada)
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>{{ $entrada->evento->nombre_evento }}</span>
                        <a href="{{ route('entradas.descargar', $entrada->id) }}" class="btn btn-primary btn-sm">Descargar Entrada</a>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p>No tienes ninguna entrada comprada.</p>
    @endif
</div>
@endsection

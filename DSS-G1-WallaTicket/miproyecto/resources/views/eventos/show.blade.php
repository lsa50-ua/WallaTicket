@extends('layouts.master')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{$evento->nombre_evento}}</h1>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <a href="{{route('locales.show', $evento->id)}}">
                            <img src="{{asset($evento->local->foto)}}" alt="Foto" class="img-fluid rounded">
                        </a>
                    </div>
                    <div class="mb-3">
                        <p><strong>Descripción:</strong> {{$evento->descripcion}}</p>
                        <p><strong>Fecha:</strong> {{$evento->fecha}}</p>
                        <p><strong>Tipo:</strong> {{$evento->tipo}}</p>
                        <p><strong>Aforo:</strong> {{$evento->aforo}}</p>
                        <p><strong>Edad mínima:</strong> {{$evento->edad_minima}}</p>
                    </div>
                    @if (auth()->check() && Auth::user()->rol == 'admin')
                    <form method="POST" action="{{route('eventos.destroy', ['id' => $evento->id])}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Borrar Evento</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


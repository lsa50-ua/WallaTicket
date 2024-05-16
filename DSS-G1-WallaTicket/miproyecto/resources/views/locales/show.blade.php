@extends('layouts.master')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{$local->empresa}}</h1>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="{{asset($local->foto)}}" alt="Foto" class="img-fluid rounded">
                    </div>
                    <p><strong>Dirección:</strong> {{$local->direccion}}</p>
                    @if (auth()->check() && Auth::user()->rol == 'admin')
                    <form method="POST" action="{{route('locales.destroy', ['id' => $local->id])}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Borrar Local</button>
                    </form>
                    <form method="GET" action="{{route('locales.edit', $local->id)}}">
                        <button type="submit" class="btn btn-primary">Editar Local</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

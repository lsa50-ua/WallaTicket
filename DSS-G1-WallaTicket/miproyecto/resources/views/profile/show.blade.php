@extends('layouts.master')

@section('content')

    <title>Perfil de Usuario</title>
   
    <div class="container">
        <h1>Perfil de Usuario</h1>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }} {{ $user->apellido }}</h5>
                        <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                        <p class="card-text"><strong>Teléfono:</strong> {{ $user->telefono }}</p>
                        <p class="card-text"><strong>Dirección:</strong> {{ $user->direccion }}</p>
                        <p class="card-text"><strong>Fecha de Nacimiento:</strong> {{ $user->fecha_nac }}</p>
                        <p class="card-text"><strong>DNI:</strong> {{ $user->dni }}</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection

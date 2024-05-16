@extends('layouts.master')

@section('content')

<h2>Añadir Local</h2>
        <form action="{{ route('locales.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre empresa</label>
                <input class="form-control" placeholder="Nombre del Local" required type="text" name="nombre" id="nombre">
            </div>

            <div class="form-group">
                <label for="direccion">Direccion</label>
                <input class="form-control" placeholder="Direccion del Local" required type="text" name="direccion" id="direccion">
            </div>

            <div class="form-group">
                <label for="urlImagen">Imagen del Local</label>
                <input class="form-control" placeholder="URL de la imagen" required type="text" name="urlImagen" id="urlImagen">
            </div>
            <button class="btn btn-primary" type="submit" style="margin-top: 20px; font-size: 1.2rem;">
                Añadir Local
            </button>
        </form>

@endsection
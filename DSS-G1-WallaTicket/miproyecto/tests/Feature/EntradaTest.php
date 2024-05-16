<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\Models\User;
use App\Models\Entrada;
use App\Models\Evento;

class EntradaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserEntradaRelationShip()
{

    $evento = new Evento;
    $evento->nombre_evento = 'Marmarela';
    $evento->descripcion = 'Fiesta';
    $evento->aforo = '30';
    $evento->fecha = '2000-03-20';
    $evento->tipo = 'fieston';
    $evento->edad_minima = '20';
    $evento->foto = 'url';
    $evento->save();

    $user = new User;
    $user->nombre = 'John2';
    $user->apellido = 'Lopez';
    $user->mail = 'johndoe@exa2mple.com';
    $user->clave = '123';
    $user->telefono = '111221333';
    $user->direccion = 'Alicante';
    $user->fecha_nac = '2000-03-20';
    $user->dni = '49876992C';
    $user->tarjeta = '5445-1111-2222-4444';
    $user->save();
    
    $user = DB::table('users')->where('nombre', 'John2')->first();



    // Create a new post for the user
    $entrada = new Entrada;
    $entrada->precio = '30';
    $entrada->vendida = '0';
    $entrada->user_id = $user->id;
    $entrada->evento_id = $evento->id;
    $entrada->save();
    
    $entrada = DB::table('entradas')->where('id', $user->id)->first(); // saca entrada perteneciente a John2

    
    $this->assertEquals($user->id, $entrada->user_id); 

    DB::table('entradas')->where('id', $entrada->id)->delete();
    DB::table('users')->where('id', $user->id)->delete();
    DB::table('eventos')->where('id', $evento->id)->delete();

}

public function testEventoEntradaRelationShip()
{

    $evento = new Evento;
    $evento->nombre_evento = 'Magma';
    $evento->descripcion = 'Fiesta';
    $evento->aforo = '30';
    $evento->fecha = '2001-03-20';
    $evento->tipo = 'fieston';
    $evento->edad_minima = '20';
    $evento->foto = 'url';
    $evento->save();

    $evento = DB::table('eventos')->where('nombre_evento', 'Magma')->first();

    $user = new User;
    $user->nombre = 'juan';
    $user->apellido = 'Perez';
    $user->mail = 'juanperez@example.com';
    $user->clave = '123';
    $user->telefono = '111222333';
    $user->direccion = 'Alicante';
    $user->fecha_nac = '2000-03-20';
    $user->dni = '49876993C';
    $user->tarjeta = '5555-1111-2222-4444';
    $user->save();
    
    $user = DB::table('users')->where('nombre', 'juan')->first();



    // Create a new post for the user
    $entrada = new Entrada;
    $entrada->precio = '30';
    $entrada->vendida = '0';
    $entrada->user_id = $user->id;
    $entrada->evento_id = $evento->id;
    $entrada->save();
    
    $entrada = DB::table('entradas')->where('id', $evento->id)->first(); //entrada del evento Magma

    
    $this->assertEquals($evento->id, $entrada->evento_id);

    DB::table('entradas')->where('id', $entrada->id)->delete();
    DB::table('users')->where('id', $user->id)->delete();
    DB::table('eventos')->where('id', $evento->id)->delete();

}

}
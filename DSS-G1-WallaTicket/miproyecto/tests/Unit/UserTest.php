<?php

namespace Tests\Unit;


use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testcreateUser()
    {
        // $user = new User;
        // $user->nombre = 'John';
        // $user->apellido = 'Lopez';
        // $user->mail = 'johndoe@example.com';
        // $user->clave = '123';
        // $user->telefono = '111222333';
        // $user->direccion = 'Alicante';
        // $user->fecha_nac = '2000-03-20';
        // $user->dni = '49876992C';
        // $user->tarjeta = '5555-1111-2222-4444';
        // $user->save();
    
        $this->assertDatabaseHas('users', [
            'nombre'   => 'Cristian',
                          'apellido' => 'Navarro',
                          'dni'     => '46089256Q',
                          'mail'    => 'Cristianelmejor@example.com',
                          'clave'    => 'Javilachupa',
                          'telefono' => '666666666',
                          'direccion' => 'calle_mayor',
                          'fecha_nac' => '2001-01-01' ]);
    }
}

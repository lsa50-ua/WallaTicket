<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->delete();
        
        DB::table('users')->insert([
            'name'   => 'Jose',
            'apellido' => 'O',
            'dni'     => '46089256O',
            'email'    => 'Jose@example.com',
            'password'    => Hash::make('Jose'),
            'telefono' => '666666666',
            'direccion' => 'calle_mayor',
            'fecha_nac' => '2001-01-01' ,
            'rol' => 'admin']);

        DB::table('users')->insert([
            'name'   => 'Cristian',
            'apellido' => 'Navarro',
            'dni'     => '46089256Q',
            'email'    => 'Cristianelmejor@example.com',
            'password'    => Hash::make('Javilachupa'),
            'telefono' => '666666666',
            'direccion' => 'calle_mayor',
            'fecha_nac' => '2001-01-01',
            'rol' => 'usuario' ]);

        DB::table('users')->insert([
            'name'   => 'Luis',
            'apellido' => 'S',
            'dni'     => '46089256L',
            'email'    => 'Luis@example.com',
            'password'    => Hash::make('Luis'),
            'telefono' => '666666666',
            'direccion' => 'calle_mayor',
            'fecha_nac' => '2001-01-01',
            'rol' => 'usuario' ]);
        
        DB::table('users')->insert([
            'name'   => 'Javi',
            'apellido' => 'M',
            'dni'     => '46089256J',
            'email'    => 'Javi@example.com',
            'password'    => Hash::make('Javi'),
            'telefono' => '666666666',
            'direccion' => 'calle_mayor',
            'fecha_nac' => '2001-01-01',
            'rol' => 'usuario' ]);

        DB::table('users')->insert([
            'name'   => 'Javi',
            'apellido' => 'M',
            'dni'     => '46089256H',
            'email'    => 'Prueba@example.com',
            'password'    => Hash::make('Javi'),
            'telefono' => '666666666',
            'direccion' => 'calle_mayor',
            'fecha_nac' => '2001-01-01',
            'rol' => 'usuario' ]);
    }
}

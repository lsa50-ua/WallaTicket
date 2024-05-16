<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventoTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('eventos')->delete();
        DB::table('eventos')->insert([
            'nombre_evento'   => 'Fiesta fin de exámenes',
            'descripcion'     => 'Ven a disfrutar a la mejor fiesta universitaria del año',
            'fecha'           => '2023-04-19',
            'tipo'            => 'Fiesta',
            'aforo'           => '300',
            'edad_minima'     => '18',
            'foto'            => 'images/eventos/fin_examenes.jpg',
            'local_id'        => '1'
        ]);
        
    DB::table('eventos')->insert([
        'nombre_evento'   => 'Halloween',
        'descripcion'     => 'Musicote que da miedo',
        'fecha'           => '2024-03-20',
        'tipo'            => 'Fiesta',
        'aforo'           => '10',
        'edad_minima'     => '18',
        'foto'            => 'images/eventos/halloween.jpg',
        'local_id'        => '2'
    ]);

    DB::table('eventos')->insert([
        'nombre_evento'   => 'Carnaval',
        'descripcion'     => 'Ven y disfruta de los mejores disfraces del Medusa con buena música',
        'fecha'           => '2023-03-11',
        'tipo'            => 'Fiesta',
        'aforo'           => '900',
        'edad_minima'     => '18',
        'foto'            => 'images/eventos/carnaval.jpg',
        'local_id'        => '3'
    ]);

    DB::table('eventos')->insert([
        'nombre_evento'   => 'RBF',
        'descripcion'     => 'Conecta con tus cantantes latinos favoritos este verano',
        'fecha'           => '2023-07-20',
        'tipo'            => 'Fiesta',
        'aforo'           => '300',
        'edad_minima'     => '18',
        'foto'            => 'images/eventos/cartelera_rbf.jpg',
        'local_id'        => '4'
    ]);
    }
}

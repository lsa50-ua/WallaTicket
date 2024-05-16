<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReseñaTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reseñas')->delete();
        DB::table('reseñas')->insert([
            'comentario' => 'Algo',
            'puntuacion' => '3',
            'user_id'    => '1',
            'evento_id'  => '1'
        ]);

        DB::table('reseñas')->insert([
            'comentario' => 'Algo',
            'puntuacion' => '2',
            'user_id'    => '1',
            'evento_id'  => '1'
        ]);

        DB::table('reseñas')->insert([
            'comentario' => 'Algo',
            'puntuacion' => '5',
            'user_id'    => '1',
            'evento_id'  => '1'
        ]);

        DB::table('reseñas')->insert([
            'comentario' => 'Algo',
            'puntuacion' => '5',
            'user_id'    => '1',
            'evento_id'  => '1'
        ]);
    }
}

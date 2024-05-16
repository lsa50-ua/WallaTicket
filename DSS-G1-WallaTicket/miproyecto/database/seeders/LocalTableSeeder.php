<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('locals')->delete();
        DB::table('locals')->insert([
            'empresa' => 'Magma',
            'direccion' => 'Calle de los Remedios',
            'foto'  => '/images/locales/magma-club-alicante.jpg'   
        ]);

        DB::table('locals')->insert([
            'empresa' => 'TheOne',
            'direccion' => 'Calle de los Remedios',
            'foto'  => '/images/locales/theOne.jpg'      
        ]);

        DB::table('locals')->insert([
            'empresa' => 'Medusa',
            'direccion' => 'Calle de los Remedios',
            'foto'  => '/images/locales/medusa.jpg'  
        ]);

        DB::table('locals')->insert([
            'empresa' => 'Marmarela',
            'direccion' => 'Calle de los Remedios',
            'foto'  => '/images/locales/marmarela.jpg'
        ]);
    }
}

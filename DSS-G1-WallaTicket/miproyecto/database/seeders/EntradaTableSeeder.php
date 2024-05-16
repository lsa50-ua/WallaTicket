<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntradaTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('entradas')->delete();

        DB::table('entradas')->insert([
            'precio'      => '20',
            'vendida'     => '0',
            'user_id'     => '1',
            'evento_id'   => '1'
        ]);

        DB::table('entradas')->insert([
            'precio'      => '20',
            'vendida'     => '0',
            'user_id'     => '1',
            'evento_id'   => '2'
        ]);
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LocalTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(EventoTableSeeder::class);
        $this->call(EntradaTableSeeder::class);
        $this->call(ReseñaTableSeeder::class);
    }
}

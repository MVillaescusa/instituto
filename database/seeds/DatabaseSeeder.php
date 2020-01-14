<?php

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
        $this->call(UsersTableSeeder::class);
        $this->call(GruposTableSeeder::class);
        $this->call(MateriasimpartidasTableSeeder::class);
        $this->call(NivelesTableSeeder::class);
    }
}

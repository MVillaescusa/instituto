<?php

use Illuminate\Database\Seeder;

class GruposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(env('APP_ENV') != 'production') {
            DB::table('grupos')->truncate();
            // Creacion de 20 App\Grupo instances...
            $grupo = factory(App\Grupo::class, 20)->create();
        }
    }
}

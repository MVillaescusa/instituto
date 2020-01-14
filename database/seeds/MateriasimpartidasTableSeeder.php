<?php

use Illuminate\Database\Seeder;

class MateriasimpartidasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(env('APP_ENV') != 'production') {
            DB::table('materiasimpartidas')->truncate();
            // Create 20 App\Materiaimpartida instances...
            $materiasimpartidas = factory(App\Materiaimpartida::class, 20)->create()

                //TODO relacion con tablas materia, grupo y user
                /*
                ->each(function ($materiaimpartida) {
                    $materiaimpartida->users()->save(factory(App\User::class)->make());
                    $materiaimpartida->grupos()->save(factory(App\Grupo::class)->make());
                    $materiaimpartida->materias()->save(factory(App\Materia::class)->make());
                });
                */
            ;
        }
    }
}

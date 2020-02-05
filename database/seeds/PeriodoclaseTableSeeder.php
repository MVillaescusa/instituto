<?php

use Illuminate\Database\Seeder;

class PeriodoclaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(env('APP_ENV') != 'production') {
            DB::table('periodosclases')->truncate();

            $periodoslectivos = \App\Periodolectivo::all();
            $aulas = \App\Aula::all();
            $materiasimpartidas = \App\Materiaimpartida::all();

            $periodoslectivos->each(function ($periodolectivo) {
                \App\Periodoclase::create([
                    $periodolectivo,
                    $aulas[rand(0, count($aulas)-1)],
                    $materiasimpartidas[rand(0, count($materiasimpartidas)-1)]
                ]);
            });
        }
    }
}

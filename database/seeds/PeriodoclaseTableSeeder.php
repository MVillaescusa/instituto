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

            foreach($periodoslectivos as $periodolectivo) {
                $periodosclase = factory(App\Periodoclase::class, 6)->create();
                foreach($periodosclase as $periodoclase) {
                    $periodoclase->periodo_id = $periodolectivo->id;
                    $periodoclase->aula_id = $aulas[rand(0, count($aulas)-1)]->id;
                    $periodoclase->materiaimpartida_id = $materiasimpartidas[rand(0, count($materiasimpartidas)-1)]->id;
                    $periodoclase->save();
                }
            };
        }
    }
}

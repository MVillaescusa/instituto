<?php

use Illuminate\Database\Seeder;

class PeriodoslectivosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dias = array('L', 'M', 'X', 'J', 'V');
        $horas_inicio = array('08:15', '09:10', '10:05', '11:30', '12:25', '13:20');
        $horas_fin = array('09:10', '10:05', '11:30', '12:25', '13:20', '14:15');;

        if(env('APP_ENV') != 'production') {
            DB::table('periodolectivos')->truncate();

            for ($i = 0; $i < 5; $i++) {
                for ($j = 0; $j < 6; $j++) {
                    $periodo = \App\Periodolectivo::create([
                        'dia' => $dias[$i],
                        'hora_inicio' => $horas_inicio[$j],
                        'hora_fin' => $horas_fin[$j],
                        'anyoescolar_id' => rand(2019, 2025)
                    ]);
                }
            }
        }
    }
}

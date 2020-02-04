<?php

use Illuminate\Database\Seeder;

class FaltaProfesorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV') != 'production') {
            DB::table('faltasprofesores')->truncate();
            $usuarios = App\Usuario::all();
            DB::table('faltasprofesores')->insert([
                'profesor_falta' => $usuarios[rand(0, $usuarios->count()-1)] -> id,
                'profesor_guardia' => $usuarios[rand(0, $usuarios->count()-1)]  -> id,
                'periodoclase_id' => numberBetween($min = 1, $max = 30)
            ]);
        }
    }
}

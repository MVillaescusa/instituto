<?php

use Illuminate\Database\Seeder;

class AnyosescolaresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('anyosescolares')->truncate();

        $centros = App\Centro::all();

        foreach ($centros as $centro) {
            DB::table('anyosescolares')->insert([
                'fechainicio' => "2019/09/01",
                'fechafinal' => "2020/08/31",
                'centro' => $centro->id,
                'created_at' => now(),
                'updated_at' => now()
            ]);  
        }
    }
}

<?php

use App\Nivel;
use Illuminate\Database\Seeder;

class NivelesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV') != 'production') {
            DB::table('niveles')->truncate();

            Nivel::create([
                'nombre' => 'Infantil'
            ]); //id 1

            Nivel::create([
                'nombre' => 'Primaria'
            ]); //id 2

            Nivel::create([
                'nombre' => 'Enseñanza Secundaria Obligatoria'
            ]); //id 3

            Nivel::create([
                'nombre' => 'Primero',
                'nivelsuperior' => 3
            ]); //id 4

            Nivel::create([
                'nombre' => 'Segundo',
                'nivelsuperior' => 3
            ]); //id 5

            Nivel::create([
                'nombre' => 'Tercero',
                'nivelsuperior' => 3
            ]); //id 6

            Nivel::create([
                'nombre' => 'Cuarto',
                'nivelsuperior' => 3
            ]); //id 7

            Nivel::create([
                'nombre' => 'Bachillerato'
            ]); //id 8

            Nivel::create([
                'nombre' => 'Primero',
                'nivelsuperior' => 8
            ]); //id 9

            Nivel::create([
                'nombre' => 'Segundo',
                'nivelsuperior' => 8
            ]); //id 10

            Nivel::create([
                'nombre' => 'Formación Profesional'
            ]); //id 11

            Nivel::create([
                'nombre' => 'Formación Profesional Básico',
                'nivelsuperior' => 11
            ]); //id 12

            Nivel::create([
                'nombre' => 'Grado Medio',
                'nivelsuperior' => 11
            ]); //id 13

            Nivel::create([
                'nombre' => 'Grado Superior',
                'nivelsuperior' => 11
            ]); //id 14

            Nivel::create([
                'nombre' => 'Desarrollo de Aplicaciones Web',
                'nivelsuperior' => 14
            ]); //id 15

            Nivel::create([
                'nombre' => 'Primero',
                'nivelsuperior' => 15
            ]); //id 16

            Nivel::create([
                'nombre' => 'Segundo',
                'nivelsuperior' => 15
            ]); //id 17

            Nivel::create([
                'nombre' => 'Universidad'
            ]); //id 18
        }
    }
}

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
        Schema::disableForeignKeyConstraints();
        $this->call(UsersTableSeeder::class);
        $this->call(MateriaTableSeeder::class);
        $this->call(MateriamatriculadaTableSeeder::class);
        $this->call(AnyosescolaresTableSeeder::class);
        $this->call(TutorizadosTableSeeder::class);
        $this->call(GruposTableSeeder::class);
        $this->call(MateriasimpartidasTableSeeder::class);
        $this->call(NivelesTableSeeder::class);
<<<<<<< HEAD
        $this->call(PeriodoslectivosTableSeeder::class);
=======
        $this->call(PeridoclaseTableSeeder::class);
>>>>>>> a mitad de esto, arreglando la migracion por el nombre
        Schema::enableForeignKeyConstraints();
    }
}

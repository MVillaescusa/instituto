<?php

use Illuminate\Database\Seeder;

class TutorizadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(env('APP_ENV') != 'production') {
            DB::table('tutorizados')->truncate();

            $users = factory(App\User::class, 50)->create()
                ->each(function ($user) {
                $user->tutor()->save(factory(App\Tutorizado::class)->make());
            });
        }
    }
}

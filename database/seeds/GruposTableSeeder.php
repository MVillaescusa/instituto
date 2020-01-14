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
        DB::table('grupos')->truncate();

        
        /*
        if(env('APP_ENV') != 'production') {
            DB::table('users')->truncate();
            DB::table('centros')->truncate();
            // Create 3 App\User instances...
            $users = factory(App\User::class, 3)->create()
                ->each(function ($user) {
                $user->centros()->save(factory(App\Centro::class)->make());
            });

            $users = factory(App\User::class, 97)->create();
        }
        */
    }
}

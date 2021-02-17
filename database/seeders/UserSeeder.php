<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         User::factory()
        ->count(15)
        #->hasPosts(1)
        ->create();

        $this->call([
            UserSeeder::class,
        ]);
    }
}

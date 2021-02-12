<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('category')->insert([
            'name' => Str::random(10),
            'parent' => Str::random(10)
        ]);

        Category::factory()
            ->count(50)
            ->hasPosts(1)
            ->create();
    }
}

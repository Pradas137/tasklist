<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'cat_id' => Category::all()->random()->id
        ];
    }
}
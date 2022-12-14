<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Task::class;

    public function definition()
    {
        return [
            'user_id' => 1,
            'title' => $this->faker->sentence(5),
            'status' => false,
        ];
    }
}

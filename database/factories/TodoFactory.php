<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'subject'=> $this->faker->sentence(6),
            'detail' => $this->faker->paragraph(3),
            'deadline' => $this->faker->dateTimeBetween('now', '+1 month'),
            'completed' => $this->faker->boolean(50),
        ];
    }
}

<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $estadoTarea = ['Pendiente', 'Completada', 'En pausa', 'En progreso', 'Revisión'];
        return [
            'description' =>fake()->jobTitle(),
            'user_id'=> User::factory(),
            'estado' => $this->faker->randomElement($estadoTarea),
        ];
    }
}

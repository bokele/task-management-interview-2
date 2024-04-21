<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $name = fake()->title();
        return [
            'user_id' => User::factory(),
            'project_id' => Project::factory(),
            'slug' => Str::slug($name) . time(),
            'name' => $name,
            'priority' => rand(1, 10)

        ];
    }
}

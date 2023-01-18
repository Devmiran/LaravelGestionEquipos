<?php

namespace Database\Factories;

use App\Models\Sport;
use App\Models\Trainer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>fake()->name(),
            'description'=>fake()->paragraph(),
            'average'=>fake()->randomFloat(2,0,10),
            'sports_id'=>Sport::all()->random()->id,
            'trainers_id'=>Trainer::all()->random()->id
        ];
    }
}

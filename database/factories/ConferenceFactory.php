<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Conference>
 */
class ConferenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'location' => fake()->city(),
            'url' => fake()->url(),
            'startsAt' => fake()->dateTimeBetween('+1 week', '+1 month'),
            'endsAt' => fake()->dateTimeBetween('+1 month', '+2 months'),
            'cfp_startsAt' => fake()->dateTimeBetween('now', '+1 week'),
            'cfp_endsAt' => fake()->dateTimeBetween('+1 week', '+3 weeks'),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->sentence(3);
        $startsAt = fake()->dateTimeBetween('now', '+3 months');

        return [
            'organization_id' => Organization::factory(),
            'name' => $name,
            'slug' => Str::slug($name).'-'.fake()->unique()->randomNumber(4),
            'description' => fake()->paragraphs(2, true),
            'location' => fake()->address(),
            'starts_at' => $startsAt,
            'ends_at' => fake()->dateTimeBetween($startsAt, (clone $startsAt)->modify('+7 days')),
        ];
    }
}

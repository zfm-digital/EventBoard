<?php

namespace Database\Factories;

use App\Enums\HelpRequestStatus;
use App\Models\Event;
use App\Models\HelpRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<HelpRequest>
 */
class HelpRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'event_id' => Event::factory(),
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'status' => HelpRequestStatus::Open,
            'resolved_at' => null,
        ];
    }

    /**
     * Indicate that the help request is resolved.
     */
    public function resolved(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => HelpRequestStatus::Resolved,
            'resolved_at' => now(),
        ]);
    }

    /**
     * Indicate that the help request is in progress.
     */
    public function inProgress(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => HelpRequestStatus::InProgress,
        ]);
    }

    /**
     * Indicate that the help request is closed.
     */
    public function closed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => HelpRequestStatus::Closed,
        ]);
    }
}

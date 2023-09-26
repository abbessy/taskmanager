<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $stringArray = array(
            "client",
            "responsable",
            "agent"
        );

        // Generate a random index
        $randomIndex = array_rand($stringArray);

        // Retrieve the random string
        $randomString = $stringArray[$randomIndex];

        $email = fake()->unique()->safeEmail();

        return [
            'name' => fake()->name(),
            'email' => $email,
            'email_verified_at' => now(),
           // 'user_type' => "admin",
            'user_type' => $randomString,
            'password' => bcrypt($email),

           // 'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->userName();
        return [
            'name' => $name,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'image' => $this->generateImageUrl($name),
            'bio' => fake()->realText(100),
            'remember_token' => Str::random(10),
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

    /**
     * Create a user with specific details.
     *
     * @param string $name
     * @param string $email
     * @param string $password
     * @return static
     */
    public function define(string $name, string $email, string $password): static
    {
        return $this->state(function (array $attributes) use ($name, $email, $password) {
            return [
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'image' => $this->generateImageUrl($name),
            ];
        });
    }

    /**
     * Generate a placeholder image URL based on the user's name.
     *
     * @param string $name
     * @return string
     */
    private function generateImageUrl(string $name): string
    {
        $firstChar = strtoupper(substr($name, 0, 1));
        $randomHexColor = str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        return "https://placehold.co/400x400/{$randomHexColor}/ffffff?text={$firstChar}";
    }
}

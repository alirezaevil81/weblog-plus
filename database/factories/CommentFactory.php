<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'post_id' => Post::inRandomOrder()->first()->id ?? Post::factory(),
            'body' => $this->faker->paragraph,
            'is_approved' => $this->faker->boolean(80), // 80% chance of being true
            'parent_id' => null,
        ];
    }

    /**
     * Indicate that the comment is a reply to another comment.
     */
    public function reply(): static
    {
        return $this->state(function (array $attributes) {
            // Find a random existing comment to reply to
            $parentComment = Comment::inRandomOrder()->first();

            return [
                'parent_id' => $parentComment?->id,
                'post_id' => $parentComment?->post_id, // Ensure reply belongs to the same post
            ];
        });
    }
}

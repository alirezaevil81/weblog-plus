<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear the table first
        Comment::query()->delete();

        // Create 50 top-level comments
        Comment::factory()->count(50)->create();

        // Create 50 replies
        Comment::factory()->count(50)->reply()->create();
    }
}

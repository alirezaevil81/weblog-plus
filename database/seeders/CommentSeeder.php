<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();
        $users = User::all();

        if ($posts->isEmpty() || $users->isEmpty()) {
            $this->command->warn('هیچ پست یا کاربری برای ایجاد کامنت وجود ندارد. لطفا ابتدا PostSeeder و UserSeeder را اجرا کنید.');
            return;
        }

        // ایجاد کامنت‌های فیک برای هر پست
        foreach ($posts as $post) {
            // 3-5 کامنت اصلی برای هر پست
            $mainComments = Comment::factory(rand(3, 5))->create([
                'post_id' => $post->id,
                'user_id' => fn() => $users->random()->id,
                'parent_id' => null
            ]);

            // برای هر کامنت اصلی، 1-3 پاسخ ایجاد کنید
            foreach ($mainComments as $comment) {
                Comment::factory(rand(1, 3))->create([
                    'post_id' => $post->id,
                    'user_id' => fn() => $users->random()->id,
                    'parent_id' => $comment->id
                ]);
            }
        }
    }
}
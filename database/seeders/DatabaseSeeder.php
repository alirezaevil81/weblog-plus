<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ساخت کاربر ادمین با مشخصات دلخواه
        User::factory()->define(
            'alireza',
            'alirezask385@gmail.com',
            'alireza1381'
        )->create();
        // ایجاد 10 کاربر فیک
        $users = User::factory(4)->create();

        // ایجاد 20 پست فیک با کاربران تصادفی
        $posts = Post::factory(5)->create([
            'user_id' => function() use ($users) {
                return $users->random()->id;
            }
        ]);

        // ایجاد کامنت‌های فیک برای هر پست
        foreach ($posts as $post) {
            // 3-5 کامنت اصلی برای هر پست
            $mainComments = Comment::factory(rand(3, 5))->create([
                'post_id' => $post->id,
                'user_id' => function() use ($users) {
                    return $users->random()->id;
                },
                'parent_id' => null
            ]);

            // برای هر کامنت اصلی، 1-3 پاسخ ایجاد کنید
            foreach ($mainComments as $comment) {
                $repliesCount = rand(1, 3);
                $replies = Comment::factory($repliesCount)->create([
                    'post_id' => $post->id,
                    'user_id' => function() use ($users) {
                        return $users->random()->id;
                    },
                    'parent_id' => $comment->id
                ]);

                // برای برخی پاسخ‌ها، پاسخ سطح دوم ایجاد کنید (0-2 پاسخ)
                foreach ($replies as $reply) {
                    $nestedRepliesCount = rand(0, 2);
                    if ($nestedRepliesCount > 0) {
                        Comment::factory($nestedRepliesCount)->create([
                            'post_id' => $post->id,
                            'user_id' => function() use ($users) {
                                return $users->random()->id;
                            },
                            'parent_id' => $reply->id
                        ]);
                    }
                }
            }
        }

        $this->command->info('✅ سیدر با موفقیت اجرا شد:');
        $this->command->info('👥 کاربران: ' . User::count());
        $this->command->info('📝 پست‌ها: ' . Post::count());
        $this->command->info('💬 کامنت‌ها: ' . Comment::count());
    }
}

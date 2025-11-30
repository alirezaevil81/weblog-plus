<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // دریافت تمام کاربران برای اختصاص دادن به پست‌ها
        $users = User::all();

        if ($users->isEmpty()) {
            $this->command->warn('هیچ کاربری برای اختصاص دادن به پست‌ها وجود ندارد. لطفا ابتدا UserSeeder را اجرا کنید.');
            return;
        }

        // ایجاد 20 پست فیک با کاربران تصادفی
        Post::factory(20)->create([
            'user_id' => fn() => $users->random()->id
        ]);
    }
}
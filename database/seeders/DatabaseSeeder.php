<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $startTime = microtime(true);

        // پاک کردن کش دسترسی‌ها برای جلوگیری از خطا
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $this->call([
            RolesAndPermissionsSeeder::class,
            UserSeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
        ]);
        $executionTime = round(microtime(true) - $startTime, 2);

        $this->command->info(PHP_EOL . '✅ Database seeding completed successfully!');

        $this->command->table(
            ['موجودیت (Entity)', 'تعداد (Count)'],
            [
                ['Roles (نقش‌ها)', Role::count()],
                ['Permissions (دسترسی‌ها)', Permission::count()],
                ['Users (کاربران)', User::count()],
                ['Posts (پست‌ها)', Post::count()],
                ['Comments (کامنت‌ها)', Comment::count()],
            ]
        );

        $this->command->info("⏱️ Total execution time: {$executionTime} seconds.");
    }
}

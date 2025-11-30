<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ساخت کاربر ادمین با مشخصات دلخواه
        $adminUser = User::factory()->define(
            'alireza',
            'alirezask385@gmail.com',
            'alireza1381'
        )->create();
        $adminUser->assignRole('Admin');

        // ایجاد 4 کاربر فیک با نقش نویسنده
        User::factory(4)->create()->each(fn ($user) => $user->assignRole('Writer'));
    }
}
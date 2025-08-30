<?php

namespace Database\Factories;

use App\Models\post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = post::class;

    public function definition(): array
    {
        $title = fake()->realText(50);
        $randomHexColor = str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        return [
            'title' => $title,
            'user_id' => User::factory(),
            'category' => fake()->city(),
            'slug' => Str::slug($title),
            'body' => $this->faker->realText(6000),
            'image' => "https://placehold.co/800x400/$randomHexColor/ffffff?text=$title",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

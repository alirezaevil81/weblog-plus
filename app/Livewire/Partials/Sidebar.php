<?php

namespace App\Livewire\Partials;

use Carbon\CarbonInterval;
use Livewire\Attributes\Computed;
use Livewire\Component;
use App\Models\Post;

class Sidebar extends Component
{
    public $persianNumbers = ['۱', '۲', '۳'];

    #[Computed(seconds: 3600, cache: true,)]
    public function randomPosts()
    {
        return Post::inRandomOrder()
            ->select('title', 'slug')
            ->limit(3)
            ->get();
    }

    public function render()
    {
        return view('livewire.partials.sidebar');
    }
}

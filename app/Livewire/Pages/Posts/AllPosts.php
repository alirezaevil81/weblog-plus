<?php

namespace App\Livewire\Pages\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;

class AllPosts extends Component
{
    use WithPagination;

    #[Computed]
    public function posts()
    {
        return Post::query()
            ->latest()
            ->paginate(5);
    }

    public function render()
    {
        return view('livewire.pages.posts.all-posts')
            ->layoutData([
                'hero' => true,
                'sidebar' => true
            ]);
    }
}

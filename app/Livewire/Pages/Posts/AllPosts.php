<?php

namespace App\Livewire\Pages\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class AllPosts extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.pages.posts.all-posts',[
            'posts' => Post::query()->latest()->paginate(5),
        ])->layoutData([
            'hero' => true,
            'sidebar' => true
        ]);
    }
}

<?php

namespace App\Livewire\Pages\Posts;

use App\Models\Post;
use Livewire\Component;

class ShowPost extends Component
{
    public Post $post;

    public function mount(Post $post): void
    {
        $this->post = $post->load(['user', 'comments']);
    }

    public function render()
    {
        return view('livewire.pages.posts.show-post')->layoutData([
            'hero' => true,
            'sidebar' => true,
            'title' => $this->post->title,
        ]);
    }
}

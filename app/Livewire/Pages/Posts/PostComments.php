<?php

namespace App\Livewire\Pages\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Rule;

class PostComments extends Component
{
    public Post $post;

    #[Rule('required|min:3|max:500')]
    public string $body = '';

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function save()
    {
        $this->validate();

        $this->post->allComments()->create([
            'user_id' => auth()->id(),
            'body' => $this->body,
        ]);

        $this->reset('body');
        
        $this->dispatch('comment-added', 'دیدگاه شما با موفقیت ثبت شد و پس از تایید نمایش داده خواهد شد.');
    }

    public function render()
    {
        $approvedComments = $this->post
            ->allComments()
            ->where('is_approved', true)
            ->latest()
            ->get();

        $userUnapprovedComments = collect();
        if (auth()->check()) {
            $userUnapprovedComments = $this->post
                ->allComments()
                ->where('user_id', auth()->id())
                ->where('is_approved', false)
                ->latest()
                ->get();
        }

        $comments = $userUnapprovedComments->merge($approvedComments)->sortByDesc('created_at');

        return view('livewire.pages.posts.post-comments', [
            'comments' => $comments,
        ]);
    }
}

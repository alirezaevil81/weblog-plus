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

    public ?int $replyToId = null;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function setReplyTo(?int $commentId = null)
    {
        $this->replyToId = $commentId;
        $this->reset('body');
    }

    public function save()
    {
        $this->validate();

        $this->post->comments()->create([
            'user_id' => auth()->id(),
            'body' => $this->body,
            'parent_id' => $this->replyToId,
        ]);

        $this->reset('body', 'replyToId');
        
        $this->dispatch('comment-added', 'دیدگاه شما با موفقیت ثبت شد و پس از تایید نمایش داده خواهد شد.');
    }

    public function render()
    {
        $comments = $this->post->comments()
            ->with(['user', 'replies' => function ($query) {
                $query->where('is_approved', true)->with('user');
            }])
            ->where('is_approved', true)
            ->latest()
            ->get();

        // Also load the user's own unapproved comments
        if (auth()->check()) {
            $userUnapprovedComments = $this->post->comments()
                ->where('user_id', auth()->id())
                ->where('is_approved', false)
                ->with(['user', 'replies'])
                ->latest()
                ->get();
            
            $comments = $comments->merge($userUnapprovedComments)->sortByDesc('created_at');
        }

        return view('livewire.pages.posts.post-comments', [
            'comments' => $comments,
        ]);
    }
}

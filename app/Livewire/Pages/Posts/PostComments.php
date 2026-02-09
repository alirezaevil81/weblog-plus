<?php

namespace App\Livewire\Pages\Posts;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Computed;

class PostComments extends Component
{
    public Post $post;

    #[Rule('required|min:3|max:1000|string')]
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
        $this->resetValidation();
    }

    public function cancelReply()
    {
        $this->setReplyTo(null);
    }

    public function save()
    {
        // 1. Authorization
        Gate::authorize('create', Comment::class);

        // 2. Rate Limiting (Prevent Spam)
        $executed = RateLimiter::attempt(
            'send-comment:' . auth()->id(),
            $perMinute = 5,
            function() {
                // 3. Validation
                $this->validate();

                // 4. Database Transaction
                DB::transaction(function () {
                    $this->post->allComments()->create([
                        'user_id' => auth()->id(),
                        'body' => strip_tags($this->body), // Basic sanitization
                        'parent_id' => $this->replyToId,
                    ]);
                });

                // 5. Reset State
                $this->reset('body', 'replyToId');
                unset($this->userUnapprovedComments); // Clear cache

                // 6. Feedback
                $this->dispatch('comment-added', 'دیدگاه شما با موفقیت ثبت شد و پس از تایید نمایش داده خواهد شد.');
            }
        );

        if (! $executed) {
            $seconds = RateLimiter::availableIn('send-comment:' . auth()->id());
            $this->addError('body', "لطفاً $seconds ثانیه صبر کنید و دوباره تلاش نمایید.");
        }
    }

    #[Computed(persist: true, cache: true)]
    public function comments()
    {
        return $this->post
            ->comments()
            ->where('is_approved', true)
            ->with(['user', 'approvedReplies'])
            ->latest()
            ->get();
    }

    #[Computed(persist: true, cache: true)]
    public function userUnapprovedComments()
    {
        if (auth()->guest()) {
            return collect();
        }

        return $this->post
            ->allComments()
            ->where('user_id', auth()->id())
            ->where('is_approved', false)
            ->with('user')
            ->latest()
            ->get();
    }

    public function render()
    {
        return view('livewire.pages.posts.post-comments', [
            'comments' => $this->comments,
            'userUnapprovedComments' => $this->userUnapprovedComments,
        ]);
    }
}

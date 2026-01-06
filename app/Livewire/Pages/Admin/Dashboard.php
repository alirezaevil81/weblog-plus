<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    public function approve(Comment $comment)
    {
        $comment->update(['is_approved' => true]);
        
        // Optional: Add a success message
        session()->flash('message', 'دیدگاه با موفقیت تایید شد.');
    }

    public function delete(Comment $comment)
    {
        $comment->delete();
        
        // Optional: Add a success message
        session()->flash('message', 'دیدگاه با موفقیت حذف شد.');
    }

    public function render()
    {
        $comments = Comment::where('is_approved', false)
            ->with(['user', 'post'])
            ->latest()
            ->paginate(10);

        return view('livewire.pages.admin.dashboard', [
            'comments' => $comments,
        ]);
    }
}

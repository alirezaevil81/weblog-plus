<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Only authenticated users can create comments.
        return !is_null($user);
    }

    /**
     * Determine whether the user can reply to a comment.
     */
    public function reply(User $user, Comment $comment): bool
    {
        // Users can only reply to approved comments.
        // You might add more logic here, e.g., prevent replying to own comment.
        return $comment->is_approved;
    }
}

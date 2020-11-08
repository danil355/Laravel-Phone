<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\Phone;
use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function create(User $user, Phone $phone) {

        return $phone->comments()
            ->where('user_id', $user->id)
            ->doesntExist();

    }

    public function delete(User $user, Comment $comment) {

        if ($comment->created_at->diffInMinutes(now()) >= 10)
            return false;

        return $comment->user_id == $user->id;
    }
}

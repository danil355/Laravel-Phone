<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentFormRequest;
use App\Models\Comment;
use App\Models\Phone;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentFormRequest $request, Phone $phone) {
        $this->authorize('create', [Comment::class, $phone]);

        $data = $request->validated();

        $comment = new Comment($data);
        $comment->user()->associate(auth()->user());
        $comment->phone()->associate($phone);
        $comment->save();

        return redirect()->route('phones.show', $phone);
    }

    public function destroy(Comment $comment) {
        $this->authorize('delete', $comment);

        $phone = $comment->phone_id;
        $comment->delete();

        return redirect()->route('phones.show', $phone);
    }
}

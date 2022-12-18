<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\blog\Comment;
use Illuminate\Support\Facades\Auth;

class Comments extends Component
{
    public $postId;
    public $message;
    public $replyCommentId = NULL;
    public $replyReplyId = NULL;

    public $designTemplate = 'tailwind';

    protected $rules = [
        'message' => 'required'
    ];

    public function render()
    {
        $comments = Comment::whereNull('parent_id')
            ->with('replies')
            ->latest()
            ->get();
        return view('livewire.comments', [
            'comments' => $comments
        ]);
    }

    public function save_comment()
    {
        $this->validate();

        Comment::create([
            'post_id' => $this->postId,
            'user_id' => Auth::user()->id,
            'message' => $this->message,
            'parent_id' => $this->replyCommentId
        ]);

        $this->post_id = '';
        $this->user_id = '';
        $this->message = '';
        $this->replyCommentId = NULL;
    }

        public function save_replay()
    {
        $this->validate();

        Comment::create([
            'post_id' => $this->postId,
            'user_id' => Auth::user()->id,
            'message' => $this->message,
            'parent_id' => $this->replyReplyId
        ]);

        $this->post_id = '';
        $this->user_id = '';
        $this->message = '';
        $this->replyReplyId = NULL;
    }

    public function reply($commentId)
    {
        $this->replyCommentId = $commentId;
    }
}

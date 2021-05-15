<?php

namespace App\Http\Livewire\Posts;

use App\Models\Comment;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Comments extends Component
{
    public $post;
    public $comment = '';

    protected $rules = [
        'comment' => 'min:3|string|max:200',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'comment' => 'min:3|string|max:200',
        ]);
    }

    public function createNewComment()
    {
        $this->validate();

        if (!empty($this->comment)) {
            Comment::create([
                'post_id' => $this->post->id,
                'user_id' => auth()->id(),
                'comment' => $this->comment
            ]);

            $this->comment = '';
        }
    }

    public function render()
    {
        return view('livewire.posts.comments', [
            'comments' => Comment::query()->where('post_id', $this->post->id)->with('user')->orderByDesc('id')->get(),
            'post'     => $this->post
        ]);
    }
}

<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class DetailPost extends Component
{
    public $post, $related_posts, $top_hot_post;

    public function render()
    {
        return view('livewire.posts.detail-post');
    }
    public function mount(){

        $this->related_posts = Post::where('category_id', $this->post->category_id )
            ->where('id', '<>', $this->post->id)
            ->orderBy('created_at', 'DESC')
            ->limit(3)->get();
        $this->top_hot_post = Post::where('top_hot', 1)->orderBy('created_at', 'DESC')->limit(3)->get();
    }

}

<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class TopHotPosts extends Component
{

    public $top_hot_posts, $posts, $post_id, $post_title;
    public $viralPosts = '';

    public function render()
    {
        $this->top_hot_posts = Post::where('top_hot', 1)->get();
        return view('livewire.posts.top-hot-posts');
    }

    public function mount(){
        $this->posts = Post::orderBy('created_at')->get();
    }

    public function edit($id){
        $this->post_id = '';
        $post = Post::find($id);
        $this->post_id = $post->id;
        $this->post_title = $post->title;
     }

}

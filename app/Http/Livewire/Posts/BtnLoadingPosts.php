<?php

namespace App\Http\Livewire\Posts;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class BtnLoadingPosts extends Component
{

    public $categories, $posts;


    public function render()
    {
        return view('livewire.posts.btn-loading-posts');
    }

    public function mount(){
        $this->categories = Category::where('parent_id', '<>', 0)->limit(4)->get();
        $this->posts = Post::orderBy('created_at', 'DESC')->get();
    }
}

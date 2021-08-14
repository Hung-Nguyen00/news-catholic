<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class DetailCategory extends Component
{
    public $category, $posts_category, $latest_posts, $top_hot_post, $size_loading = 5, $check_loading = true ;

    public function render()
    {
        $count_category = Category::where('parent_id', '<>', 0)->count();
        if ($this->size_loading < $count_category){
            $this->posts_category = Post::where('category_id', $this->category->id)
                ->orderBy('created_at', 'DESC')
                ->limit($this->size_loading)
                ->get();

        }else{
            $this->posts_category = Post::where('category_id', $this->category->id)
                ->orderBy('created_at', 'DESC')
                ->get();
            $this->check_loading = false;
        }
        return view('livewire.categories.detail-category');
    }
    public function mount(){
        $this->latest_posts = Post::where('top_hot', 0)->orderBy('created_at', 'DESC')->limit(3)->get();
        $this->top_hot_post = Post::where('top_hot', 1)->orderBy('created_at', 'DESC')->limit(3)->get();
    }
    public  function addMorePost(){
        $this->size_loading += 5;
    }
}

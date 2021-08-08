<?php

namespace App\Http\Livewire\Posts;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class BtnLoadingPosts extends Component
{

    public $categories, $posts, $number_categories = 2, $check_loading = true, $show_loading = false;


    public function render()
    {
        $count_category = Category::where('parent_id', '<>', 0)->count();

            if ($this->number_categories <= $count_category){
                $this->categories = Category::with('posts')
                    ->where('parent_id', '<>', 0)
                    ->limit($this->number_categories)
                    ->get();

            }else{
                $this->categories = Category::with('posts')
                    ->where('parent_id', '<>', 0)
                    ->get();
                $this->check_loading = false;
            }
            if ($this->number_categories == $count_category && $count_category % 2 == 0 ){
                $this->check_loading = false;
            }
            if ($this->number_categories + 1 == $count_category && $count_category % 2 !== 0 ){
                $this->check_loading = false;
            }
        $this->posts = Post::orderBy('created_at', 'DESC')->get();
        $this->show_loading = false;
        return view('livewire.posts.btn-loading-posts');
    }

    public function mount(){
        $this->categories = Category::with('posts')
            ->where('parent_id', '<>', 0)
            ->limit($this->number_categories)
            ->get();
        $this->posts = Post::orderBy('created_at', 'DESC')->get();
    }

    public function plusCategory(){

        $this->number_categories += 2;
        $this->show_loading = true;
    }
}

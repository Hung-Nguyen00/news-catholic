<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class OwnPosts extends Component
{
    public $posts;

    public function render()
    {
        return view('livewire.posts.own-posts');
    }



    public function deletePost($id){
        $post = Post::find($id);
        if ($post)
        {
            $post->delete();
            Session::flash('message', 'Deleted successfully');
            Session::flash('alert-class', 'alert-info');
        }else{
            Session::flash('message', 'Not Found');
            Session::flash('alert-class', 'alert-danger');
        }
        return redirect()->route('admin.posts.own_post');
    }
}

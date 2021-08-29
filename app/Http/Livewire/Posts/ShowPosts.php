<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ShowPosts extends Component
{
    public $posts, $categories, $category;

    public function render()
    {
        return view('livewire.posts.show-posts');
    }


    public function deletePost($id){
        $post = Post::find($id);
        if ($post)
        {
            $post->delete();
            Toastr::success('Xóa thành công', 'Thành công');
        }else{
            Toastr::error('Không tìm thấy', 'Lỗi');
        }
        return redirect()->route('admin.posts.index');
    }
}

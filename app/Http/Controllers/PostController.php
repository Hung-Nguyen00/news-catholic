<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category')->orderBy('created_at')->get();
        return view('admin.posts.all_posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', '<>', 0)->get();
        return view('admin.posts.add_post', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        if(Auth::id())
        {
            // save image to  storage/public/uploads.
            $file = $request->file('image');

            $filename = $file->getClientOriginalName();
            $img = Image::make($file);
            $img->resize(240, 150)->save(public_path('uploads/'.$filename));
            // auth before save request->all to database.
            Auth::user()->posts()->create([
                    'short_description' => $request->short_description,
                    'image' => $filename,
                    'title' => $request->title,
                    'category_id' => $request->category_id,
                    'content' => $request->content_post,
                ]
            );

            // be like $request->user()->id
            return redirect()->route('admin.posts.index')
                ->with('success', 'Tạo bài viết mới thành công');
        }else
        {
            return view('auth.login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function ownPost()
    {
        $posts = Post::with(['category'])->where('user_id', Auth::id())->orderBy('created_at')->get();
        return view('admin.posts.ownPost', compact('posts'));
    }

    public function showTopHot(){
        return view('admin.posts.top_hot_posts');
    }
    public function changeTopHot(Request $request){
        $current_post = Post::find($request->id);
        $new_post = Post::find($request->new_id);
        if ($current_post && $new_post){
            $current_post->update(['top_hot' => 0]);
            $new_post->update(['top_hot' => 1]);
            Session::flash('message', 'Cập nhập thành công');
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        }
        Session::flash('message', 'Không tìm thấy bài viết');
        Session::flash('alert-class', 'alert-danger');
        return redirect()->back();
    }


    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit_post', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::find($id);
        if($request->image != null){
            $post->update($request->all());
        }else{
            $post->update($request->except('image'));
        }
        Session::flash('message', 'Cập nhập thành công');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        if(Auth::id())
        {
            $this->validate($request,  [
                'short_description' => ['required', 'max:250'],
                'title' => ['required'],
                'image' => 'required', 'image|mimes:jpeg,png,jpg,gif,svg',
                'category_id' => 'required',
                'content_post' => 'required'
            ]);
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
                ->with('success', 'A new post posted successfully');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function update(Request $request, $id)
    {

        $post = Post::find($id);
        if($request->image != null){
            $post->update($request->all());
        }else{
            $post->update($request->except('image'));
        }
        Session::flash('message', 'Updated successfully!');
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

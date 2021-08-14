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
use function Livewire\str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category')->orderBy('created_at', 'DESC')->get();
        $categories = Category::where('parent_id', '<>', 0)->get();
        return view('admin.posts.all_posts', compact('posts', 'categories'));
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
            $img->save(public_path('uploads/'.$filename));
            // auth before save request->all to database.
            $description = $request->content_post;
            if(!$request->has('is_copy')) {
                $dom = new \DomDocument();
                libxml_use_internal_errors(true);
                $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                libxml_clear_errors();
                $images = $dom->getElementsByTagName('img');
                foreach ($images as $k => $img) {
                    $data = $img->getAttribute('src');
                    list($type, $data) = explode(';', $data);
                    list($type, $data) = explode(',', $data);
                    $data = base64_decode($data);
                    $image_name = "/uploads/" . time() . $k . '.png';
                    $path = public_path() . $image_name;
                    file_put_contents($path, $data);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $image_name);
                }
                $description = $dom->saveHTML();
            }
            Auth::user()->posts()->create([
                    'short_description' => $request->short_description,
                    'image' => $filename,
                    'title' => $request->title,
                    'category_id' => $request->category_id,
                    'content' => $description,
                    'is_video' => $request->is_video ? 1 : 0,
                ]
            );
            return redirect()->route('admin.posts.index')->with(['message' => 'Tạo bài viết mới thành công']);
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
    public function show(Post $post)
    {
        if ($post){
            return view('details_post', compact('post'));
        }else{
            return redirect()->back();
        }
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


    public function showVideo(){

        $posts = Post::with('category')
            ->orderBy('created_at', 'DESC')
            ->where('is_video', '=', 1)
            ->get();
        $categories = Category::where('parent_id', '<>', 0)->get();
        return view('admin.posts.video_posts', compact('posts', 'categories'));
    }

    public function searchByCategory(Request $request){
        $category = Category::find($request->category_id);
        if ($category){
            $posts = Post::where('category_id', $request->category_id)->get();
            $categories = Category::where('parent_id', '<>', 0)->get();
            return view('admin.posts.search_by_category',
                    compact('posts', 'categories','category'));
        }else{
            return back();
        }

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
        $description = $request->content_post;
        if($request->image != null){
            $file = $request->file('image');

            $filename = $file->getClientOriginalName();
            $img = Image::make($file);
            $img->save(public_path('uploads/'.$filename));

            $post->update(array_merge($request->except('image', 'content_post'),
                        ['is_video' => $request->is_video ? 1 : 0, 'image' => $filename,
                          'content' => $description ]));
        }else{
            $post->update(array_merge($request->except('image'),
                ['is_video' => $request->is_video ? 1 : 0,
                'content' => $description]));
        }

        return redirect()->route('admin.posts.index')->with(['message' => 'Cập nhập bài viết thành công']);
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

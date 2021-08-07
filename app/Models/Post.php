<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'short_description',
      'content',
      'category_id',
      'user_id',
        'image',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function boot() {
        parent::boot();
        static::creating(function ($post) {
            $slug_count = Post::where('slug', Str::slug($post->title))->count();
            if ($slug_count > 0){
                $slug = $post->title .'-' .($slug_count + 1);
                $post->slug = Str::slug($slug);
            }
            else{
                $post->slug = Str::slug($post->title);
            }
        });
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public  function category(){
        return $this->belongsTo(Category::class);
    }
}

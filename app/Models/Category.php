<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sort_order',
        'parent_id',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function boot() {
        parent::boot();
        static::creating(function ($question) {
            $question->slug = Str::slug($question->name);
        });
    }

    public function children(){
        return $this->hasMany(Category::class, 'parent_id')->with('children');
    }

}

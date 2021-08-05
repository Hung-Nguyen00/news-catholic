<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'sort_order',
        'parent_id',
    ];
    protected $dates = ['deleted_at'];

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

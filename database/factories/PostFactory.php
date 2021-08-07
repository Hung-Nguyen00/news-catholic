<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userMin = DB::table('users')->max('id');
        $userMax = DB::table('users')->min('id');
        $categoryMin = DB::table('categories')->min('id');
        $categoryMax = DB::table('categories')->max('id');

        return [
            'title' => $this->faker->name,
            'image' => 'download.png',
            'short_description' => $this->faker->name,
            'content' => $this->faker->text,
            'category_id'=> rand($categoryMin, $categoryMax),
            'user_id' => rand($userMin, $userMax),
        ];
    }
}

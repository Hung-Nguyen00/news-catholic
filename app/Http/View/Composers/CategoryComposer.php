<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use App\Models\Contacts;
use App\Models\Information;
use App\Models\Post;
use Illuminate\View\View;

class CategoryComposer
{
    /**
     * Bind data to the view.
     * Bind data vào view. $view->with('ten_key_se_dung_trong_view', $data);
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $categories = Category::where('parent_id', 0)->with('children')->limit(5)->get();
        $category_footer = Category::where('parent_id', '<>', 0)->with('children')->get();
        $socials = Information::all();
        $contact = Contacts::first();
        $view->with(['categories' => $categories,
            'category_footer' => $category_footer,
            'socials' => $socials,
            'contact' =>$contact]);
    }
}
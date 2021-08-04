<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class Showcategories extends Component
{
    public $categories;

    public function render()
    {
        $this->categories = Category::where('parent_id', 0)->with('children')->get();
        return view('livewire.categories.showcategories');
    }
}

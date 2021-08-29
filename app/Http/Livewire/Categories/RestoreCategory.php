<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class RestoreCategory extends Component
{

    public $categories, $trashedCategory;


    private function resetInputFields(){
        $this->trashedCategory = '';

    }

    public function cancel()
    {
        $this->resetInputFields();
    }

    public function render()
    {
        $this->categories = Category::onlyTrashed()->get();
        return view('livewire.categories.restore-category');
    }

    public function edit($id){
        $this->trashedCategory = Category::withTrashed()->find($id);
    }

    public function restore(){
        if ($this->trashedCategory){
            $this->trashedCategory->restore();
            Toastr::success('Khôi phục thành công', 'Thành công');
        }
    }
    public function delete(){
        if ($this->trashedCategory){
            $this->trashedCategory->forceDelete();
            Toastr::success('Xóa thành công', 'Thành công');
        }
    }
}

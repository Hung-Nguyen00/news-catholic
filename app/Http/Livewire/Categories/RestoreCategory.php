<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
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
            $this->showMessage('Khôi phục menu con thành công', 'success');
        }
    }
    public function delete(){
        if ($this->trashedCategory){
            $this->trashedCategory->forceDelete();
            $this->showMessage('Xóa menu con thành công', 'success');
        }
    }

    public function  showMessage($message, $type){
        Session::flash('message', $message);
        Session::flash('alert-class', 'alert-'.$type);
    }
}

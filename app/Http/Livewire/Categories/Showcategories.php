<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Showcategories extends Component
{
    public $categories, $name, $category, $category_id, $child_category;

    public function render()
    {
        $this->categories = Category::where('parent_id', 0)->with('children')->get();
        return view('livewire.categories.showcategories');
    }
    protected $rules = [
        'name' => 'required',
    ];
    protected $messages = [
        'name.required' => 'Tên menu không được phép trống',
    ];
    private function resetInputFields(){
        $this->name = '';
        $this->category = '';
        $this->category_id = '';
    }

    public function cancel()
    {
        $this->resetInputFields();
    }


    // realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $validatedData = $this->validate();
        if ($this->category_id != null && Category::find($this->category_id)){
            Category::create(array_merge($validatedData, ['parent_id' => $this->category_id]));
            Toastr::success('Tạo mới thành công', 'Thành công');
        }else{
            Category::create($validatedData);
            Toastr::success('Tạo mới thành công', 'Thành công');
        }
        $this->resetInputFields();
    }

    // take value from interface
    public function edit($id){
        $this->category = Category::find($id);
        if ($this->category){
            $this->name = $this->category->name;
            $this->category_id = $this->category->parent_id;
        }
    }

    public function editChild($id){
        $this->resetInputFields();
        $this->category = Category::find($id);
        if ($this->category){
            $this->category_id = $this->category->id;
        }
    }

    public function update(){
        $validatedData = $this->validate();
        if ($this->category){
            $this->category->update($validatedData);
            Toastr::success('Cập nhập thành công', 'Thành công');
        }else{
            Toastr::error('Không tìm thấy', 'Lỗi');
        }
    }

    public function delete(){
        if ($this->category){
            $this->category->delete();
            Toastr::success('Xóa thành công', 'Thành công');
        }else{
            Toastr::error('Không tìm thấy', 'Lỗi');
        }
    }
}

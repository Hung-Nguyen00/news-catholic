<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
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
            $this->showMessage('Tạo mới menu con thành công', 'success');
        }else{
            Category::create($validatedData);
            $this->showMessage('Tạo mới menu thành công', 'success');
        }
        $this->resetInputFields();
    }

    public function  showMessage($message, $type){
        Session::flash('message', $message);
        Session::flash('alert-class', 'alert-'.$type);
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
            $this->showMessage('Cập nhập menu thành công', 'success');
        }else{
            $this->showMessage('Không tìm thấy menu', 'danger');
        }
        $this->resetInputFields();
    }

    public function delete(){
        if ($this->category){
            $this->category->delete();
            $this->showMessage('Xóa menu thành công', 'success');
        }else{
            $this->showMessage('Không tìm thấy menu', 'danger');
        }
    }
}

<?php

namespace App\Http\Livewire\Socials;

use App\Models\Information;
use Brian2694\Toastr\Facades\Toastr;
use Livewire\Component;

class CrudAd extends Component
{
    public $all_social, $name_social, $url, $social;

    public function render()
    {

        $this->all_social = Information::orderBy('created_at', 'DESC')->get();
        return view('livewire.socials.crud-ad');
    }

    protected $rules = [
        'name_social' => 'required',
        'url' => 'required',
    ];
    protected $messages = [
        'name_social.required' => 'Tên thông tin liên lạc không được phép trống',
        'url.required' => 'Tên nhà tài trợ không được phép trống',
    ];

    private function resetInputFields(){
        $this->name_social = '';
        $this->url = '';
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
        Information::create($validatedData);
        Toastr::success('Tạo mới thành công', 'Thành công');
        return redirect()->route('admin.socials.index');
    }

    // take value from interface
    public function edit($id){
        $this->cancel();
        $this->social = Information::find($id);
        if ($this->social){
            $this->name_social = $this->social->name_social;
            $this->url = $this->social->url;
        }
    }

    public function update(){
        $validatedData = $this->validate();
        $this->social->update($validatedData);
        Toastr::success('Cập nhập thành công', 'Thành công');
        return redirect()->route('admin.socials.index');
    }

    public function delete(){
        if ($this->social){
            $this->social->delete();
            Toastr::success('Xóa thành công', 'Thành công');
            return redirect()->route('admin.socials.index');
        }else{
            Toastr::error('Không tìm thấy', 'Lỗi');
            return redirect()->route('admin.socials.index');
        }
    }
}

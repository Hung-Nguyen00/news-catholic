<?php

namespace App\Http\Livewire\Contacts;

use App\Models\Contacts;
use Brian2694\Toastr\Facades\Toastr;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrudAd extends Component
{
    use WithFileUploads;
    public $contact, $name_website, $description, $logo, $number_phone, $image_update;
    public function render()
    {
        $this->contact = Contacts::first();
        return view('livewire.contacts.crud-ad');
    }

    protected $rules = [
        'name_website' => 'required',
        'description' => 'required',
        'number_phone' => 'required|min:10|regex:/[0-9]{9}/'
    ];
    protected $messages = [
        'name_website.required' => 'Tên thông tin liên lạc không được phép trống',
        'description.required' => 'Giới thiệu website không được phép trống',
        'number_phone.required' =>'Số điện thoại không được phép trống',
        'number_phone.min' =>'Số điện thoại nhỏ hơn :min',
        'mimes.min' =>'Số điện thoại phải là giá trị số 0-9',
    ];

    // realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    // take value from interface
    public function edit($id){
        $this->contact = Contacts::find($id);
        if ($this->contact){
            $this->name_website = $this->contact->name_website;
            $this->logo = $this->contact->logo;
            $this->number_phone = $this->contact->number_phone;
            $this->description = $this->contact->description;
        }
    }
    public function update(){
        $validatedData = $this->validate();
        $this->contact->update($validatedData);
        Toastr::success('Cập nhập thành công', 'Thành công');
        return redirect()->route('admin.contacts.index');
    }

    public function update_image(){
        $validatedData = $this->validate(
            [
                'image_update' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
            ['image_update.image' => 'File nhập vào phải là hình ảnh',
              'image_update.mimes' => 'File nhập phải phải thuộc kiểu :mimes']
        );
        $validatedData['image_update'] = $this->image_update->store('uploads', 'public');
        dd($validatedData['image_update']);
        if ($this->contact){
            $this->contact->update([
                'logo' => $validatedData['image_update']
            ]);
            Toastr::success('Cập nhập thành công', 'Thành công');
            return redirect()->route('admin.contacts.index');
        }else{
            Toastr::error('Có lỗi', 'Lỗi');
            return redirect()->route('admin.contacts.index');
        }

    }
}

<?php

namespace App\Http\Livewire\Advertises;

use App\Models\Advertise;
use Brian2694\Toastr\Facades\Toastr;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrudAd extends Component
{
    use WithFileUploads;

    public $name, $all_ad, $advertise ,$company_name, $image, $image_update , $number_phone;

    public function render()
    {
        $this->all_ad = Advertise::orderBy('created_at', 'DESC')->get();
        return view('livewire.advertises.crud-ad');
    }
    protected $rules = [
        'name' => 'required',
        'company_name' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'number_phone' => 'min:10|regex:/[0-9]{9}/'
    ];
    protected $messages = [
        'name.required' => 'Tên quảng cáo không được phép trống',
        'company_name.required' => 'Tên nhà tài trợ không được phép trống',
        'number_phone.min' => 'Số điện thoại không được nhỏ hơn 10 ký tự',
        'image.max' => 'Dung lượng hình ảnh quá lớn',
        'number_phone.regex' => 'Số điện thoại phải là ký tự số',
    ];


    private function resetInputFields(){
        $this->name = '';
        $this->company_name = '';
        $this->image = '';
        $this->number_phone = '';
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
        $validatedData['image'] = $this->image->store('uploads', 'public');
        Advertise::create($validatedData);
        Toastr::success('Tạo mới thành công', 'Thành công');
        return redirect()->route('admin.advertises.index');
    }

    // take value from interface
    public function edit($id){
        $this->cancel();
        $this->advertise = Advertise::find($id);
        if ($this->advertise){
            $this->name = $this->advertise->name;
            $this->company_name = $this->advertise->company_name;
            $this->number_phone = $this->advertise->number_phone;
            $this->image = $this->advertise->image;
        }
    }

    public function update(){
        $validatedData = $this->validate();
        $this->advertise->update($validatedData);
        Toastr::success('Cập nhập thành công', 'Thành công');
        return redirect()->route('admin.advertises.index');
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
        if ($this->advertise){
            $this->advertise->update([
                'image' => $validatedData['image_update']
            ]);
        }
        Toastr::success('Cập nhập thành công', 'Thành công');
        return redirect()->route('admin.advertises.index');
    }

    public function delete(){
        if ($this->advertise){
            $this->advertise->delete();
            Toastr::success('Xóa thành công', 'Thành công');
            return redirect()->route('admin.advertises.index');
        }else{
            Toastr::error('Không tìm thấy', 'Lỗi');
            return redirect()->route('admin.advertises.index');
        }
    }
}

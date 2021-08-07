<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegisterUser extends Component
{

    public $email, $password, $name, $password_confirmation;

    public function render()
    {
        return view('livewire.users.register-user');
    }

    protected $rules = [
        'name' => ['required', 'string', 'max:100'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ];

    protected $messages = [
        'email.required' => 'Email không được phép trống',
        'email.unique' => 'Email đã tồn tại',
        'email.email' => 'Tên tài bắt buộc là email',
        'name.required' => ':attribute không được phép trống',
        'password.required' => ':attribute  không được để trống',
        'password.confirmed' => ':attribute phải trùng với mậu khẩu nhập lại',
        'password.min' => ':attribute phải trên 8 ký tự',
    ];

    protected $validationAttributes = [
        'email' => 'email',
        'password' => 'Mật khẩu',
        'name' => 'Tên'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store(){
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role_id' => 1,
        ]);
        return redirect()->route('admin.users.index');
    }


}

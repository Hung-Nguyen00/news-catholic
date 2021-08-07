<?php

namespace App\Http\Livewire\Users;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ShowUsers extends Component
{

    public $users, $roles, $user;

    private function resetInputFields(){
        $this->user = '';
    }

    public function cancel()
    {
        $this->resetInputFields();
    }
    public function mount(){
        $this->roles = Role::all();
    }

    public function render()
    {
        return view('livewire.users.show-users');
    }

    public function edit($id){
        $this->user = User::find($id);
    }


    public function changeRole($value, $user_id){
        $user = User::find($user_id);
        if (Role::find($value) && $user){
            $user->update(['role_id' => $value]);
            Session::flash('message', 'Updated successfully');
            Session::flash('alert-class', 'alert-info');
        }
        return redirect()->route('admin.users.index');
    }

    public function destroy(){
        if ($this->user){
            $this->user->delete();
        }
        return redirect()->route('admin.users.index');
    }
}

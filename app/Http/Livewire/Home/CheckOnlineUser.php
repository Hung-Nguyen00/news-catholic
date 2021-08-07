<?php

namespace App\Http\Livewire\Home;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class CheckOnlineUser extends Component
{

    public  $users;

    public function render()
    {

        return view('livewire.home.check-online-user');
    }


}

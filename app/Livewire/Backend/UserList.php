<?php

namespace App\Livewire\Backend;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
//use App\Traits\DatatableTraits;
class UserList extends Component
{
    use WithPagination;
     public function mount()
    {

    }
    public function render()
    {
        $users = User::query()->latest()->paginate(10);
        return view('livewire.backend.user-list',[
            'users' => $users
        ])->layout('layouts.app');
    }
}

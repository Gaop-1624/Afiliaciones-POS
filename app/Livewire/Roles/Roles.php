<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
     public $roleid;

    public function update(Role $role){
        return redirect()->route('Admin.Roles.Edit', ['roleid' => $role->id]);
    } 

    public function render()
    {
        $roles = Role::where('name', 'like', '%'.request('search'). '%')
        ->orWhere('created_at', 'like', '%'.request('search'). '%') 
        ->paginate(6);

        return view('livewire.roles.roles', [
            'roles' => $roles
        ]);
    }
}

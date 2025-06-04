<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EditRoles extends Component
{
    public $description, $name, $rolid, $rol;
    public $seletedpermiso = [];

     public function closeModal(){
        $this->resetValidation();
        $this->redirectRoute('Admin.Roles');
    }

    public function mount($roleid = null)
    { 
        $this->rol=$roleid;
    }

    public function render()
    {
        $permisos = Permission::all();
        $rol = Role::find($this->rol);
        $allpermisos = $rol->permissions;
        return view('livewire.roles.edit-roles', [
            'permisos' => $permisos,
            'rol' => $rol,
            'allpermisos' => $allpermisos,
            $this->name = $rol->name,
            $this->description = $rol->description,
        ]);
    }
}

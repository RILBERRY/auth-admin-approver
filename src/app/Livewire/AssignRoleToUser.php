<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use LivewireUI\Modal\ModalComponent;


class AssignRoleToUser extends ModalComponent
{
    public $role_id;
    public $role;
    public $filteredUsers;
    public $searchParams = '';
    public function boot()
    {
        $this->role = Role::find($this->role_id);
    }

    public function getFilteredData()
    {
        $this->filteredUsers = User::with('roles')->where('name', 'like', '%' . $this->searchParams . '%')
            ->get();

    }


    function assignRoleToUser($userId)  {
        $user = User::find($userId);
        $user->assignRole($this->role);
    }
    function removeRole($userId)  {
        $user = User::find($userId);
        $user->removeRole($this->role);
    }
    public function render()
    {
        $this->getFilteredData();
        return view('livewire.assign-role-to-user');
    }
}

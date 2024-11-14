<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use LivewireUI\Modal\ModalComponent;


class RolePermissionsUpdater extends ModalComponent
{
    public $role_id;
    public $permissions;
    public $rolePermissions;
    public $filteredPermission;
    public $searchParams = '';
    public function boot()
    {
        $this->role = Role::find($this->role_id);
    }

    public function getFilteredData()
    {
        $this->filteredPermission = $this->permissions = Permission::with(['roles' => function($query) {
                $query->where('id', $this->role->id);
            }])
            ->where('name', 'like', '%' . $this->searchParams . '%')
            ->latest('id')->get();


    }


    function assignPermission($permissionId)  {
        $permission = Permission::find($permissionId);
        $this->role->givePermissionTo($permission);
    }
    function removePermission($permissionId)  {
        $permission = Permission::find($permissionId);
        $this->role->revokePermissionTo($permission);
    }

    public function render()
    {
        $this->getFilteredData();
        return view('livewire.role-permissions-updater');
    }
}



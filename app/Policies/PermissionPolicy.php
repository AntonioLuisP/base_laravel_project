<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Permission;

class PermissionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $logado)
    {
        return true;
    }

    public function view(User $logado, Permission $permission)
    {
        return true;
    }

    public function create(User $logado)
    {
        return true;
    }

    public function update(User $logado, Permission $permission)
    {
        return true;
    }

    public function delete(User $logado, Permission $permission)
    {
        return true;
    }

    public function restore(User $logado)
    {
        return true;
    }

    public function forceDelete(User $logado, Permission $permission)
    {
        return true;
    }
}

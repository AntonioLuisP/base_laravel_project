<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $logado)
    {
        return true;
    }

    public function view(User $logado, User $user)
    {
        return true;
    }

    public function create(User $logado)
    {
        return false;
    }

    public function update(User $logado, User $user)
    {
        return $logado->id === $user->id;
    }

    public function delete(User $logado, User $user)
    {
        return $logado->id === $user->id;
    }

    public function restore(User $logado)
    {
        return $logado->id === $user->id;
    }

    public function forceDelete(User $logado, User $user)
    {
        return $logado->id === $user->id;
    }
}

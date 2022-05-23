<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PostType;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostTypePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $logado)
    {
        return true;
    }

    public function view(User $logado, PostType $post_type)
    {
        return true;
    }

    public function create(User $logado)
    {
        return true;
    }

    public function update(User $logado, PostType $post_type)
    {
        return true;
    }

    public function delete(User $logado, PostType $post_type)
    {
        return true;
    }

    public function restore(User $logado)
    {
        return true;
    }

    public function forceDelete(User $logado, PostType $post_type)
    {
        return true;
    }
}

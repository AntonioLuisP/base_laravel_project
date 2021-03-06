<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $logado)
    {
        return true;
    }

    public function view(User $logado, Post $post)
    {
        return true;
    }

    public function create(User $logado)
    {
        return true;
    }

    public function update(User $logado, Post $post)
    {
        return true;
    }

    public function delete(User $logado, Post $post)
    {
        return true;
    }

    public function restore(User $logado)
    {
        return true;
    }

    public function forceDelete(User $logado, Post $post)
    {
        return true;
    }
}

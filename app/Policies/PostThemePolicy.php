<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PostTheme;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostThemePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $logado)
    {
        return true;
    }

    public function view(User $logado, PostTheme $post_theme)
    {
        return true;
    }

    public function create(User $logado)
    {
        return true;
    }

    public function update(User $logado, PostTheme $post_theme)
    {
        return true;
    }

    public function delete(User $logado, PostTheme $post_theme)
    {
        return true;
    }

    public function restore(User $logado)
    {
        return true;
    }

    public function forceDelete(User $logado, PostTheme $post_theme)
    {
        return true;
    }
}

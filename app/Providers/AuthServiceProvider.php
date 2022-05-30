<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        'App\Models\User' => 'App\Policies\UserPolicy',
        'App\Models\Post' => 'App\Policies\PostPolicy',
        'App\Models\PostTheme' => 'App\Policies\PostThemePolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function (User $user, $ability) {
            return $user->hasRole('Super Admin') ? true : false;
        });
    }
}

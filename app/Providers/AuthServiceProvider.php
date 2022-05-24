<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        'App\Models\User' => 'App\Policies\UserPolicy',
        'App\Models\Post' => 'App\Policies\PostPolicy',
        'App\Models\PostType' => 'App\Policies\PostTypePolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}

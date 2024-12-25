<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as BaseController;

class AuthServiceProvider extends BaseController
{
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
     ];

    /**
     * Register services.
     */
    // public function register(): void
    // {
    //     //
    // }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('update-card', function ($user, $card) {
            return $user->id === $card->user_id;
        });

        Gate::define('delete-card', function ($user, $card) {
            return $user->id === $card->user_id || $user->is_admin;
        });

        Gate::define('admin-card', function ($user) {
            return $user->is_admin; 
        });
    }
}

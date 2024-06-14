<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Auth::provider('admin', function ($app, array $config) {
            // 返回一个实现了 UserProviderInterface 的用户提供者实例
            return new AdminProvider($app->make('hash'), $config['model']);
        });

        Auth::extend('admin', function ($app, $name, array $config) {
            // 返回一个实现了 Guard 接口的 Guard 实例
            return new AdminGuard(Auth::createUserProvider($config['provider']), $app->make('session.store'));
        });

        /* define an admin role */
        Gate::define('isAdmin', function ($user) {
            return $user->isAdmin();
        });
        
    }
}

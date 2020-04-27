<?php

namespace App\Providers;

use Illuminate\Auth\Access\Gate as AccessGate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('create-post',function($user){
            return $user->id == 1  && $user->email == 'namphog97@gmail.com';
        });

        Gate::define('update-post',function($user){
            return $user->id == 1 && $user->email == 'namphog97@gmail.com';
        });

        Gate::define('delete-post',function($user){
            return $user->id == 1  && $user->email == 'namphog97@gmail.com';
        });



        //
    }
}

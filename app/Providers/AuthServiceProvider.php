<?php

namespace App\Providers;

use App\Policies\SubsPolicy;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        User::class => SubsPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //==== For Gate authorization
        //        Gate::define("subs_only",function ($user){
        //            if($user->is_admin){
        //                return true;
        //            }
        //            return false;
        //        });

        //==== For Policy authorization
       Gate::define("subs_only","App\Policies\SubsPolicy@subscribe");



    }
}

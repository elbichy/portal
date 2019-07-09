<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
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
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies();

        $this->registerPolicies($gate);
        $gate->define('isAdmin', function($user){
            return $user->isAdmin == 1;
        });
        $gate->define('sup', function($user){
            return $user->cadre_id == 1;
        });
        $gate->define('insp', function($user){
            return $user->cadre_id == 2;
        });
        $gate->define('ca', function($user){
            return $user->cadre_id == 3;
        });
        $gate->define('hasSubmitted', function($user){
            return $user->hasSubmitted == 1;
        });
    }
}

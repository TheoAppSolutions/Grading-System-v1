<?php

namespace App\Providers;

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
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('own-subject', function (User $user, $subject_id) {
            if ($user->id == $subject_id->user_id):
                return true;
            elseif ($user->id == $subject_id->user2_id):
                return true;
            elseif ($user->id == 1):
                return true;
            else:
                return false;
            endif;
        });
    }
}

<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Models\Todo;
use App\Models\Group;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define("show-update-todo", function(User $user, Todo $todo) {
            return $user->id === $todo->user_id;
        });

        Gate::define("show-update-group", function(User $user, Group $group) {
            return $user->id === $group->user_id;
        });
    }
}

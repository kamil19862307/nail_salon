<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Admin can CRUD everywhere
//        Gate::before(function (User $user){
//            if ($user->role === 1)
//                return true;
//            else
//                return false;
//        });

        // Only admin or author can create posts
//        Gate::define('create-post', function (User $user){
//            return in_array($user->role, [1, 2]);
//        });

        // A specific author can edit only his own post, but the admin can edit any post
//        Gate::define('update-post', function (User $user, Post $post){
//            return $user->id === $post->user_id;
//        });

        // A specific author can delete only his own post, but the admin can delete any post
//        Gate::define('delete-post', function (User $user, Post $post){
//            return $user->id === $post->user_id;
//        });
    }
}

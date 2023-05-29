<?php

namespace App\Providers;

use App\Models\User;
use App\Models\mitra;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('admin', function(User $user){
            return $user->role === 'admin';
        });
        Gate::define('investor', function(User $user){
            return $user->role === 'investor';
        });
        Gate::define('mitra', function(User $user){
            return $user->role === 'mitra';
        });
        // Gate::define('mitraValid', function(User $user){  
        //     $mitra = mitra::where('user_id', $user->id);      
        //     return $mitra->status === 'active';
        // });
    }
}

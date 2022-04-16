<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');

        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        Gate::define('admin', function(User $user) {
            return $user->role_id === 1;
        }) ;
        Gate::define('ceo', function(User $user) {
            return $user->role_id === 2;
        }) ;
        Gate::define('manager', function(User $user) {
            return $user->role_id === 3;
        }) ;
        Gate::define('adv', function(User $user) {
            return $user->role_id === 4;
        }) ;
        Gate::define('cs', function(User $user) {
            return $user->role_id === 5;
        }) ;
        Gate::define('dgm', function(User $user) {
            return $user->role_id === 6;
        }) ;
        Gate::define('cwm', function(User $user) {
            return $user->role_id === 7;
        }) ;
        Gate::define('it', function(User $user) {
            return $user->role_id === 8;
        }) ;

        Gate::define('announcement', function(User $user){
            return $user->role_id === 1 || $user->role_id === 2 || $user->role_id === 3;
        });
        //
        Gate::define('staff', function(User $user){
            return $user->role_id === 1;
        });
        Gate::define('product', function(User $user){
            return $user->role_id === 1 || $user->role_id === 5;
        });
        Gate::define('lead', function(User $user){
            return $user->role_id === 1 || $user->role_id === 6;
        });
    }
}

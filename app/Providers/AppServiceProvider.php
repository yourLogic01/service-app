<?php

namespace App\Providers;

use App\Models\IndexData;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;

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
        Paginator::useBootstrap();

        config(['app.locale' => 'id']);
        Carbon::setLocale('id');

        view()->composer('*', function ($view) {
            $data = IndexData::first();
            $view->with('data', $data);
        });

        Gate::define('admin', function (User $user) {
            return $user->role->name === 'admin';
        });
    }
}

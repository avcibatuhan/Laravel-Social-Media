<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use View;
use Auth;


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
        View::composer('layouts.body.layout', function ($view) {
            $view->with('friends', Auth::user()->friends);
        });
    }
}

<?php

namespace LaravelForum\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;
use LaravelForum\Channel;

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
        //*********Default String Length ***********
        Schema::defaultStringLength(191);

//        View::share('channels', 'Channel 1');

        \View::composer('*', function($view){
            $view->with('channels', Channel::all());
        });

//        View::share('channels', [
//
//            'name' => 'Channel 1'
//
//        ]);
    }
}

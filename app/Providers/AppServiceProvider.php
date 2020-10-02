<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

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

        Inertia::share('flash', function () {
            return [
                'message' => Session::get('message'),
                'success' => Session::get('success'),
                'error' => Session::get('error'),
            ];
        });

        Inertia::share([
            'errors' => function () {
                return Session::get('errors') ? Session::get('errors')->getBag('default')->getMessages()
                    : (object) [];
            },
        ]);

        Inertia::share('auth.user',function(){
            if(\Auth::user()){
                return [
                    'id' => \Auth::user()->id,
                    'name' => \Auth::user()->name,
                ];
            }
        });
    }
}

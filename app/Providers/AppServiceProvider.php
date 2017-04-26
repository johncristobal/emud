<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //share provide to all the views
        //share header to all views
        $view = view('header');
        $pie = view('foot');
        //Change it to string
        $conten = (string)$view;
        $picontent = (string)$pie;
        //load to variable in php
        View::share('head', $conten);
        View::share('scrip',$picontent);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

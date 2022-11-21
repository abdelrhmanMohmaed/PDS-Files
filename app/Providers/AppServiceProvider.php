<?php

namespace App\Providers;

use App\Models\Packfile;
use App\Models\Pdsfile;
use App\Models\Video;
use App\Models\Workfile;
use Illuminate\Pagination\Paginator;
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
        view()->composer('*', function ($view) {
            $view->with('pdsCount',  Pdsfile::count());
            $view->with('workCount',  Workfile::count());
            $view->with('packCount',  Packfile::count());
            $view->with('videoCount',  Video::count());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}

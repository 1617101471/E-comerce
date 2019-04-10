<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('frontend.side', function ($view) {
            // $category = \App\Category::all();
            $recent = \App\Artikel::orderBy('created_at', 'desc')->take(4)->get();
            $view->with(compact('recent'));
        });

        view()->composer('frontend.sideproduk', function ($view) {
            // $category = \App\Category::all();
            $recent = \App\Produk::orderBy('created_at', 'desc')->take(4)->get();
            $view->with(compact('recent'));
        });
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

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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
        $categories = Category::with('children')->has('children')->whereParentId(0)->whereStatus(1)->get();
        
        view()->composer([
            'client.home',
            'client.product.list',
        ], function ($view) use ($categories) {
            $view->with([
                'categories' => $categories,
            ]);
        });
    }
}

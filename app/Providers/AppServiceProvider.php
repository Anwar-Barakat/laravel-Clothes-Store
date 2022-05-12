<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        Schema::defaultStringLength(191);
        Paginator::useBootstrapThree();

        View::composer('frontend.layouts.main-header', function ($view) {
            $view->with('sections', Section::with('categories')->get());
        });

        View::composer('frontend.layouts.footer', function ($view) {
            $view->with([
                'sections'      => Section::with('categories')->get(),
                'setting'       => Setting::first(),
                'categories'    => Category::where(['status' => 1, 'parent_id' => 0])
                    ->inRandomOrder()
                    ->limit(5)
                    ->get()
            ]);
        });

        View::composer('frontend.shop', function ($view) {
            $view->with([
                'sections'  => Section::with('categories')->get(),
                'brands'    => Brand::all(),
            ]);
        });

        View::composer('frontend.partials.popular_products', function ($view) {
            $view->with('popular_products', Product::limit(5)->inRandomOrder()->get());
        });
    }
}

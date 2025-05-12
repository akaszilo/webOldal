<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

use App\Models\Brand;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Session::start();
        View::composer('*', function ($view) {
            $view->with('allBrands', Brand::orderBy('name')->get());
        });
    }
}

<?php

namespace App\Providers;


use Illuminate\Support\Facades\Schema;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Social;
use App\Models\Logo;
use View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
   
     public function boot()
    {
        Paginator::useBootstrap();
        View::composer('*', function($view)
        {
             
              $link=Social::latest()->take(1)->get();
              $logo=Logo::latest()->take(1)->get();
            $view->with('link', $link)->with('logo', $logo);
        });

      
    }
}

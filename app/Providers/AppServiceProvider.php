<?php

namespace App\Providers;


use Illuminate\Support\Facades\Schema;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
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
        View::composer('master.header' , function($view)
        {
             
          $logo=Logo::logo();
           $cat=Category::category();
          $view->with('cat', $cat)->with('logo', $logo);
        });

      
    }
}

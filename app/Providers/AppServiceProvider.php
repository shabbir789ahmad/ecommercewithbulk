<?php

namespace App\Providers;


use Illuminate\Support\Facades\Schema;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Social;
use App\Models\Logo;
use App\Http\Traits\StoreTrait;
use View;
class AppServiceProvider extends ServiceProvider
{
    use StoreTrait;
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
             
           // $link=Social::latest()->take(1)->get();
            // $logo=Logo::select('logo','id')->latest()->get();
            // $view->with('logo', $logo);
        });

      
    }
}

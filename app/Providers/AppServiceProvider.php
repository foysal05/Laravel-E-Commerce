<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use View;
use App\Category;
use Illuminate\Support\ServiceProvider;
use Gloudemans\Shoppingcart\Facades\Cart;
//use Gloudemans\Shoppingcart\Cart;

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


      View::composer('front-end.partials.header', function ($view) {
          $view->with('categories',Category::where('publication_status',1)->get());
                
       });

        // View::composer('front-end.partials.header', function ($view) {
        //     $view->with(
        //         Cart::total($decimals, $decimalSeperator, $thousandSeperator)
        //     );
        // });
    }
}

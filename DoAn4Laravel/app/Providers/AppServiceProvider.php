<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\nha_san_xuat;
use App\Cart;
use App\san_pham;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Viewwith;

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
        view()->composer('Header', function ($view) {
            if (Session('Cart')) {
                $oldCart = Session::get('Cart');
                $newCart = new Cart($oldCart);
                $view->with(['Cart' => Session::get('Cart'), 'product' => $newCart->product, 'totalPrice' => $newCart->totalPrice, 'totalQty' => $newCart->totalQty]);
            }
        });
    }
}

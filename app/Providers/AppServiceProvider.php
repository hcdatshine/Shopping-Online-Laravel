<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ProductType;
use Session;
use App\Cart;
use App\FlashSale;
use App\ProductFlashSale;
use App\Product;

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
        view()->composer('header',function($view){
            $product_type = ProductType::all();
            $view->with('product_type',$product_type);
        });

        view()->composer('header',function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart'); 
                // dd($oldCart);
                $totalPrice = 0;
                foreach($oldCart->items as $i){
                    $item = $i['item'];
                    $product = Product::find($item['id']);
                    $productflashsales = ProductFlashSale::select()->with('flashSale')->where('product_id','=',$item['id'])->first();
                    if ($product->isFlashSale()) {
                        $item['sale'] = $product->unit_price*(100-intval($productflashsales->discount_percent))/100;
                    }
                    else {
                        $item['sale']=0;
                    }
                    if($item['sale']){
                        $totalPrice += $item['sale'];
                    }elseif($product->promotion_price){
                        $totalPrice += $product->promotion_price;
                    }
                    else {
                        $totalPrice += $product->unit_price;
                    }
                }

                $oldCart->totalPrice = $totalPrice;
                // dd($oldCart);
                $cart = new Cart($oldCart); 
                $view->with(['cart'=>Session::get('cart'),'product_cart'=> $cart->items,'totalPrice'=>$totalPrice,
                'totalQty'=>$cart->totalQty]);
            }
        });
    }
}

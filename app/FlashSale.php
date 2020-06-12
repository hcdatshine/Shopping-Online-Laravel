<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class FlashSale extends Model
{
    protected $table = "flashsale";

    public function products(){
        return $this->belongsToMany('App\Product','product_flashsale');
    }

    public function productFlashSales(){
        return $this->hasMany('App\ProductFlashSale', 'flash_sale_id', 'id');
        
    }
}

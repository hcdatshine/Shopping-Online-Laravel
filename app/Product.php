<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";

    public function product_type(){
        return $this->belongsTo('App\ProductType','id_type');
    }

    public function bill_detail(){
        return $this->hasMany('App\BillDetail','id_product','id');
    }

    public function flashsales(){
        return $this->belongsToMany('App\FlashSale','product_flashsale');
    }
}

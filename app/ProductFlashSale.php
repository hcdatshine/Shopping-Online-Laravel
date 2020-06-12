<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductFlashSale extends Model
{
    protected $table = "product_flashsale";

    public function flashSale()
    {
        return $this->belongsTo('App\FlashSale');
    }

    public function product()
    {
        return $this->hasOne('App\Product', 'id', 'product_id');
    }
}
